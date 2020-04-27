<?php

namespace App\Verat\Admin\Collection;

use App\Post as AppPost;
use Verat\Admin\Collection\BaseCollection;

class Post extends BaseCollection
{

    protected static $model = AppPost::class;
}
