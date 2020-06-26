<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class AppSetting extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\AppSetting';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [];

    public static $group = 'Settings';

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            Text::make('Site Name')
                ->rules('required', 'max:70'),

            Textarea::make('Site Description')
                ->rules('nullable'),

            (new Panel('Article Settings', [
                Text::make('Min number of words')->hideFromIndex()
            ])),

            (new Panel('Social Settings', [

                Text::make('Facebook')->onlyOnForms(),

                Text::make('Instagram')->onlyOnForms(),

                Text::make('Twitter')->onlyOnForms(),

                Text::make('Facebook', function () {
                    return "<a class='text-primary no-underline font-bold' href='{$this->facebook}' target='__blank'>{$this->facebook}</a>";
                })->asHtml(),

                Text::make('Twitter', function () {
                    return "<a class='text-primary no-underline font-bold' href='{$this->twitter}' target='__blank'>{$this->twitter}</a>";
                })->asHtml(),

                Text::make('Instagram', function () {
                    return "<a class='text-primary no-underline font-bold' href='{$this->instagram}' target='__blank'>{$this->instagram}</a>";
                })->asHtml(),
            ])),
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
}
