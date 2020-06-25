<?php

namespace App\Verat\Admin\Collections;

use App\Post as AppPost;
use App\PostCategory;
use App\Verat\Admin\Actions\Feature;
use App\Verat\Admin\Tabs\Drafts;
use App\Verat\Admin\Tabs\Featured;
use Illuminate\Support\Str;
use Verat\Admin\Actions\Trash;
use Verat\Admin\Collection\BaseCollection;
use Verat\Admin\Fields\BelongsTo\BelongsTo;
use Verat\Admin\Fields\CheckBox\CheckBox;
use Verat\Admin\Fields\CheckList\CheckList;
use Verat\Admin\Fields\Radio\Radio;
use Verat\Admin\Fields\Select\Select;
use Verat\Admin\Fields\Text\Text;
use Verat\Admin\Fields\TextArea\TextArea;
use Verat\Admin\Fields\Wysiwig\Wysiwig;
use Verat\Admin\Tabs\Trashed;

class Post extends BaseCollection
{

    public static $model = AppPost::class;

    protected $icon = 'feather';

    /**
     * The display name for the default tab
     */
    protected $default_tab_name = 'Published';

    protected static function tabs()
    {
        return [
            new Drafts,
            new Trashed,
            new Featured,
        ];
    }

    public static function actions()
    {
        return [
            new Feature,
            new Trash
        ];
    }

    public static function canView()
    {
        return true;
    }

    public static function canEdit()
    {
        return true;
    }

    public static function canCreate()
    {
        return true;
    }

    /**
     * Category name of the collection
     *
     * @return string
     */
    public static function categoryName()
    {
        return Str::lower(class_basename(static::class));
    }

    /**
     * Category instance
     *
     * @return \App\PostCategory
     */
    public static function category()
    {
        return PostCategory::where('slug', static::categoryName())->first();
    }

    public static function fields()
    {
        $children = static::category()->children;

        $select = Select::make('Category', 'category_id')
                    ->rules('required');

        foreach ($children as $child) {
            $select->option($child->title, $child->id);
        }

        return [
            Text::make('id')
                ->onlyOnIndex()
                ->sortable(),

            Radio::make('Status')
                ->sortable()
                ->default('draft')
                ->option('Draft')
                ->option('Published')
                ->rules('required'),

            Text::make('Title')
                ->showOnIndex()
                ->sortable()
                ->rules('required', 'max:300')
                ->note('keep it short and add keywords'),

            TextArea::make('Summary')
                ->rules('nullable', 'max:300'),

            Wysiwig::make('Content')
                ->rules('required', 'min:500'),

            $select->showOnIndex(),

            //(new BelongsTo('Media', 'file_id', FileManager::class)),

            CheckBox::make('Mark as featured post', 'featured'),

            CheckList::make('Options')
                ->option('Allow comments', null, true)
                ->option('Allow sharing', null, true)
        ];
    }
}
