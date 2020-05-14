<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $this->data();
        $meta = $this->metaData();

        if($request->expectsJson()){
            return response()->json(compact('meta', 'data'), 200);
        } else {
            return view('layouts.home', compact('meta', 'data'));
        }
    }

    /**
     * Get the skeleton view of the home page
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function skeleton()
    {
        return view('layouts.home');
    }

    /**
     * Get the data for the home page
     *
     * @return array
     */
    protected function data()
    {
        return [
            'title' => settings('site_name'),
            'featured_posts' =>  $this->featuredPosts()
        ];
    }

    protected function metaData()
    {
        return [
            'title' => settings('site_name'),
            'description' => settings('site_description'),
            'canonical' => url(route('home'), [], true)
        ];
    }

    /**
     * Get featured posts
     *
     * @return array
     */
    protected function featuredPosts()
    {
        return Post::featured()->select('slug', 'title', 'summary', 'file_id', 'category_id', 'author_id')->take(3)->get();
    }
}
