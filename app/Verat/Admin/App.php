<?php

namespace App\Verat\Admin;

use App\User;
use Verat\Admin\Bootstrapper;

class App extends Bootstrapper
{

    /**
     * Register collections
     */
    public static function collections()
    {
        return [];
    }

    /**
     * Verat customized theme
     *
     * @return string
     */
    public static function theme()
    {
        // return '/assets/css/mytheme.css';
    }

    /**
     * Register styles
     *
     * @return array
     */
    public static function styles()
    {
        return [];
    }

    /**
     * Register general alerts and notifications
     *
     * @return array
     */
    public static function notifications()
    {
        return [];
    }

    /**
     * Set the title name for the app's dashboard
     *
     * @return string
     */
    public static function dashboardTitle()
    {
        //
    }

    /**
     * Set a descriptive short note for the app's dashboard
     *
     * @return string
     */
    public static function dashboardNote()
    {
        //
    }

    /**
     * Register metrics for the application dashboard
     *
     * @return array
     */
    public static function dashboardMetrics()
    {

        return [];
    }

    /**
     * Register widgets for the application dashboard
     *
     * @return array
     */
    public static function dashboardWidgets()
    {

        return [];
    }

    /**
     * Register scripts
     *
     * @return array
     */
    public static function scripts()
    {
        return [];
    }


    /**
     * An array of users that can access the app
     *
     * @return array
     */
    public static function appUsers()
    {
        return User::all();
    }
}
