<?php

namespace App\Nova;

use App\PostCategory;
use App\Rules\WordCount;
use Froala\NovaFroalaField\Froala;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
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
        return [
            ID::make()->sortable(),
            Badge::make('Status')->map([
                'draft' => 'danger',
                'published' => 'success',
            ]),
            RadioButton::make('Status')->options([
                'draft' => 'Draft',
                'published' => 'Published'
            ])->rules('requires', Rule::in(['draft', 'published']))
            ->onlyOnForms(),
            Text::make('Title')
                ->help('Keep your title short and descriptive between 60 to 65 characters. Max. of 70 characters')
                ->rules('required', 'max:70'),
            Textarea::make('Summary')
                ->rules('nullable', 'min:60', 'max:160')
                ->help('Make your summary descriptive enough for better SEO. Must be between 60 to 160 characters.'),
            Froala::make('Content')
                ->help('Min of 500 words')
                ->rules('required', new WordCount(500))
                ->withFiles(config('filesystems.default')),

            (new Panel('Article Options', [
                Boolean::make('Featured Post', 'featured')
                ])
            ),
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
        return [];
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
        return [];
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
