<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\LayoutInterface;
use App\Http\Controllers\Utils\ControlsLayout;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller implements LayoutInterface
{
    use ControlsLayout;

    public function __invoke(Request $request)
    {
        return $this->respond($request);
    }

    public function layout()
    {
        return 'layouts.home';
    }

    /**
     * Get the data for the home page
     *
     * @return array
     */
    public function data()
    {
        return [
            'title' => settings('site_name'),
            'featured_posts' =>  $this->featuredPosts()
        ];
    }

    /**
     * Get meta data
     *
     * @return array
     */
    public function meta()
    {
        return [
            'title' => settings('site_name'),
            'description' => settings('site_description'),
            'canonical' => url(route('home'), [], true)
        ];
    }

    /**
     * Home endpoints
     *
     * @return array
     */
    public function endpoints()
    {
        return [
            'base' => route('home'),
        ];
    }

    /**
     * Get featured posts
     *
     * @return array
     */
    public function featuredPosts()
    {
        return Post::featured()->select('slug', 'title', 'summary', 'file_id', 'category_id', 'author_id')->take(3)->get();
    }
}
