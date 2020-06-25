<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class Admin extends User
{
    public static function label()
    {
        return 'Administrators';
    }
}
