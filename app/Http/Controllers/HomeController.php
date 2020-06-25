<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the home page
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        return $this->respond($this->responseData(), $request, 'layouts.home');
    }

    /**
     * Show the home page Shell
     *
     * @return \Illuminate\View\View
     */
    public function shell()
    {
        return $this->shellResponse($this->layout(), $this->endpoints());
    }

    /**
     * Layout view name
     *
     * @return string
     */
    protected function layout()
    {
        return 'layouts.home';
    }

    /**
     * Get response data
     *
     * @return array
     */
    protected function responseData()
    {
        return [
            'meta' => $this->meta(),
            'endpoints' => $this->endpoints(),
            'featured_posts' => $this->featuredPosts(),
        ];
    }

    /**
     * Get featured posts to return with the response
     *
     * @return array
     */
    protected function featuredPosts()
    {
        return Post::featured()->published()->get();
    }

    /**
     * Get response meta
     *
     * @return array
     */
    protected function meta()
    {
        return [
            'seo_title' => settings('site_name'),
            'seo_description' => settings('site_description'),
            'seo_canonical' => url(route('home'), [], true),
        ];
    }

    protected function endpoints()
    {
        return [
            'base' => route('home')
        ];
    }
}
