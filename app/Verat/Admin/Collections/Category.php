<?php

namespace App\Verat\Admin\Collections;

use App\PostCategory;
use Verat\Admin\Actions\PermanentlyDelete;
use Verat\Admin\Collection\BaseCollection;
use Verat\Admin\Fields\Select\Select;
use Verat\Admin\Fields\Text\Text;
use Verat\Admin\Fields\TextArea\TextArea;

class Category extends BaseCollection
{
    public static $model = PostCategory::class;

    protected static function defaultQuery()
    {
        return static::$model::childCategories();
    }

    protected static function tabs()
    {
        return [];
    }

    public static function actions()
    {
        return [
            new PermanentlyDelete
        ];
    }

    public static function fields()
    {
        $parent_field = Select::make('Parent', 'parent_id');

        $parents = static::$model::parentCategories()->get();
        foreach ($parents as $parent) {
            $parent_field->option($parent->title, $parent->id);
        }

        return [
            Text::make('Title')
                ->showOnIndex()
                ->sortable()
                ->rules('required'),

            $parent_field->rules('required', 'exists:post_categories,id')
                ->showOnIndex(),

            TextArea::make('Description')
                ->rules('nullable', 'string', 'max:255')
        ];
    }
}
