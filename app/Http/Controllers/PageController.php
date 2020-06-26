<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return abort(503, 'This page is still under construction');
    }

    public function write()
    {
        return abort(503, 'This page is still under construction');
    }
}
