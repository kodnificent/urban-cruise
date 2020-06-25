<?php

namespace App\Verat\Admin\Tabs;

use Verat\Admin\Tabs\Tab;

class Drafts extends Tab
{

    protected static function defaultQuery($model)
    {
        return $model::drafted();
    }

    protected static function actions()
    {

    }

    public static function canSee()
    {
        return true;
    }
}
