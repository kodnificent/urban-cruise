<?php

namespace App\Verat\Admin\Tabs;

use App\Verat\Admin\Actions\UnFeature;
use Verat\Admin\Actions\Trash;
use Verat\Admin\Tabs\Tab;

class Featured extends Tab
{

    protected static function defaultQuery($model)
    {
        return $model::published()->featured();
    }

    protected static function actions()
    {
        return [
            (new UnFeature)->label('UnFeature'),
            new Trash
        ];
    }

    public static function canSee()
    {
        return true;
    }
}
