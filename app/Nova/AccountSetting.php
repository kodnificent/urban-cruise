<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\PasswordConfirmation;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class AccountSetting extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\User';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        //
    ];

    public static $group = 'Settings';

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->where('id', $request->user()->id);
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
            Text::make('Name')
                ->required(),
            Text::make('Email')
                ->rules('required', 'email', Rule::unique('users', 'email')->ignore(request()->user()->id)),
            Text::make('Role')
                ->hideWhenUpdating()
                ->hideWhenCreating(),
            DateTime::make('Date Joined', 'created_at')
                ->format('D MMM YY - H:mm a')
                ->hideWhenUpdating()
                ->hideFromIndex(),

            (new Panel('Update Password', [
                PasswordConfirmation::make('Old Password')
                    ->rules('nullable', 'password'),
                Password::make('New Password', 'password')
                    ->onlyOnForms()
                    ->rules('nullable', 'min:6', 'confirmed'),
                PasswordConfirmation::make('Password Confirmation')
                    ->rules('nullable')
            ])),

            HasOne::make('Profile', 'profile', 'App\Nova\EditProfile')
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
