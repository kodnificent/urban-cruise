<?php

namespace App\Nova;

use App\Facades\Settings;
use App\File\StorePostImage;
use App\Nova\Actions\AllowComments;
use App\Nova\Actions\DisallowComments;
use App\Nova\Actions\Feature;
use App\Nova\Actions\Publish;
use App\Nova\Actions\SubmitForReview;
use App\Nova\Actions\UnFeature;
use App\Nova\Filters\ArticleStatus;
use App\Nova\Filters\ArticleTypeByAuthor;
use App\PostCategory;
use App\Rules\WordCount;
use Froala\NovaFroalaField\Froala;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use JD\Cloudder\Facades\Cloudder;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use OwenMelbz\RadioField\RadioButton;

abstract class Post extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Post';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title',
    ];

    public static $group = 'Articles';

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        $min = Settings::get('min_number_of_words');
        return [
            ID::make()->sortable(),

            Badge::make('Status')
                ->map([
                    'draft' => 'danger',
                    'under-review' => 'warning',
                    'published' => 'success',
                ]),

            RadioButton::make('Status')
                ->options([
                    'draft' => 'Draft',
                    'under-review' => 'Under Review',
                    'published' => 'Published'
                ])->rules(
                    'sometimes',
                    'required',
                    Rule::in(['draft', 'under-review', 'published']),
                    function ($attribute, $value, $fail) {
                        if (
                                ! in_array(request()->user()->role, ['admin', 'editor'])
                                && $value === 'published'
                            ) {
                                $fail('You dont have the permission to do this. You can only set the status to under review.');
                            }
                    }
                )
                ->onlyOnForms(),

            Select::make('Category', 'category_id')
                    ->options(function () {
                        $options = [];
                        $category = PostCategory::where('slug', static::getCategorySlug())->first();
                        $categories = $category->children()->get();

                        foreach ($categories as $category) {
                            $options[$category->id] = $category->title;
                        }

                        return $options;
                    })->onlyOnForms()
                    ->required(),

            Text::make('Title')
                ->help('Keep your title short and descriptive between 60 to 65 characters. Max. of 70 characters')
                ->rules('required', 'max:70'),

            BelongsTo::make('Category', 'category', 'App\Nova\Category')
                ->hideWhenUpdating()
                ->hideWhenCreating(),

            BelongsTo::make('Author', 'creator', 'App\Nova\Author')
                ->onlyOnDetail(),

            Textarea::make('Summary')
                ->rules('nullable', 'min:60', 'max:160')
                ->help('Make your summary descriptive enough for better SEO. Must be between 60 to 160 characters.'),

            Froala::make('Content')
                ->help("Min of $min words")
                ->rules('required', new WordCount($min))
                ->withFiles(config('filesystems.default'))
                ->attach(function ($request) {
                    $type = explode('/', $request->attachment->getMimeType())[0];
                    $cloudder = $type === 'video'
                                    ? Cloudder::uploadVideo($request->attachment->getRealPath())
                                    : Cloudder::upload($request->attachment->getRealPath());

                    return $cloudder->getResult()['secure_url'];
                }),

            Image::make('Image')
                ->hideFromIndex()
                ->preview(function () {
                    return $this->image_url;
                })
                ->thumbnail(function () {
                    return $this->image_thumbnail;
                })
                ->store(function (Request $request, $model) {
                    $cloudder = Cloudder::upload($request->image->getRealPath());
                    $public_id = $cloudder->getResult()['public_id'];

                    return [
                        'image' => $public_id
                    ];
                })
                ->delete(function (Request $request, $model, $disk, $public_id) {
                    if (! $public_id) {
                        return;
                    }

                    Cloudder::delete($public_id);

                    return [
                        'image' => null
                    ];
                })
                ->rules('image'),

            (new Panel('Article Options', [
                    Boolean::make('Featured Post', 'featured')
                        ->hideFromIndex()
                        ->showOnCreating(function ($request) {
                            return in_array(request()->user()->role, ['admin', 'editor']);
                        })
                        ->showOnUpdating(function ($request) {
                            return in_array(request()->user()->role, ['admin', 'editor']);
                        }),

                    Boolean::make('Allow Comments')
                        ->hideFromIndex()
                        ->showOnCreating(function ($request) {
                            return in_array(request()->user()->role, ['admin', 'editor']);
                        })
                        ->showOnUpdating(function ($request) {
                            return in_array(request()->user()->role, ['admin', 'editor']);
                        }),
                ])
            ),

            (new Panel('Article Info', [
                DateTime::make('Created at')
                    ->format('D MMM YY - H:mm a')
                    ->onlyOnDetail(),

                DateTime::make('Published at')
                    ->format('D MMM YY - H:mm a')
                    ->hideWhenCreating()
                    ->hideWhenUpdating(),

                BelongsTo::make('Reviewed by', 'reviewer', 'App\Nova\Editor')
                    ->onlyOnDetail(),
            ]))
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            new ArticleTypeByAuthor,
            new ArticleStatus
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            (new AllowComments)->canSee(function ($request) {
                $post = $request->findModelQuery()->first();

                if ($post && $post->allow_comments) {
                    return false;
                }

                return true;
            })->canRun(function ($request, $post) {
                return $request->user()->can('allowComments', $post);
            }),

            (new DisallowComments)->canSee(function ($request) {
                $post = $request->findModelQuery()->first();

                if ($post && ! $post->allow_comments) {
                    return false;
                }

                return true;
            })->canRun(function ($request, $post) {
                return $request->user()->can('disallowComments', $post);
            }),

            (new Feature)->canSee(function ($request) {
                $post = $request->findModelQuery()->first();

                if ($post && $post->featured) {
                    return false;
                }

                return true;
            })->canRun(function ($request, $post) {
                return $request->user()->can('feature', $post);
            }),

            (new UnFeature)->canSee(function ($request) {
                $post = $request->findModelQuery()->first();

                if ($post && ! $post->featured) {
                    return false;
                }

                return true;
            })->canRun(function ($request, $post) {
                return $request->user()->can('unFeature', $post);
            }),

            (new Publish)->canSee(function ($request) {
                $post = $request->findModelQuery()->first();

                if ($post && ! in_array($post->status, ['draft', 'under-review'])) {
                    return false;
                }

                return true;
            })->canRun(function ($request, $post) {
                return $request->user()->can('publish', $post);
            }),

            (new SubmitForReview)->canSee(function ($request) {
                if (! $request->user()->isAuthor()) {
                    return false;
                }

                $post = $request->findModelQuery()->first();

                if ($post && $post->status === 'draft' && ! $post->reviewed_by) {
                    return false;
                }

                return true;
            })->canRun(function ($request, $post) {
                return $request->user()->can('submitForReview', $post);
            }),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        $slug = static::getCategorySlug();
        $category = PostCategory::where('slug', $slug)->first();

        return $query->ofCategory($category);
    }

    protected static function getCategorySlug()
    {
        return Str::lower(class_basename(get_called_class()));
    }

    public static function label()
    {
        return Str::title(Str::snake(class_basename(get_called_class()), ' '));
    }
}
