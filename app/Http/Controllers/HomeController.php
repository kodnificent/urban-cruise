<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $this->getData();

        if($request->expectsJson()){
            return response()->json(compact('data'), 200);
        } else {
            return view('layouts.home', compact('data'));
        }
    }

    /**
     * Get the data for the home page
     *
     * @return array
     */
    protected function getData()
    {
        return [
            'title' => settings('site_name'),
            'description' => settings('site_description'),
            'logo'  =>  settings('site_logo'),
            'featured_posts' =>  $this->getFeaturedPosts()
        ];
    }

    /**
     * Get featured posts
     *
     * @return array
     */
    protected function getFeaturedPosts()
    {
        return Post::featured()->take(3)->get();
    }
}
