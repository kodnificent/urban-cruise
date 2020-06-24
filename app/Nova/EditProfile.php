<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class EditProfile extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\UserProfile';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'job_title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'user', 'job_title'
    ];

    public static $group = 'Settings';

    public static function indexQuery(NovaRequest $request, $query)
    {
        if ($request->viaRelationship()) {
            return $query;
        }

        return $query->where('user_id', $request->user()->id);
    }

    public static function label()
    {
        return 'Edit Profile';
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            BelongsTo::make('Name', 'user', 'App\Nova\AccountSetting')
                ->hideWhenUpdating(),
            Text::make('Job Title'),
            Text::make('Company'),
            Textarea::make('About'),
            Text::make('Facebook')->onlyOnForms(),
            Text::make('Linkedin')->onlyOnForms(),
            Text::make('Twitter')->onlyOnForms(),
            Text::make('Website')->onlyOnForms(),
            Text::make('Facebook', function () {
                return "<a class='text-primary no-underline font-bold' href='{$this->facebook}' target='__blank'>{$this->facebook}</a>";
            })->asHtml(),
            Text::make('Twitter', function () {
                return "<a class='text-primary no-underline font-bold' href='{$this->twitter}' target='__blank'>{$this->twitter}</a>";
            })->asHtml(),
            Text::make('Linkedin', function () {
                return "<a class='text-primary no-underline font-bold' href='{$this->linkedin}' target='__blank'>{$this->linkedin}</a>";
            })->asHtml(),
            Text::make('Website', function () {
                return "<a class='text-primary no-underline font-bold' href='{$this->website}' target='__blank'>{$this->website}</a>";
            })->asHtml(),
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
