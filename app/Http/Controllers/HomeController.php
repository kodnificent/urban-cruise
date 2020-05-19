<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\LayoutInterface;
use App\Http\Controllers\Utils\ControlsLayout;
use App\Http\Controllers\Utils\SimplePaginates;
use App\Post;
use App\PostCategory;
use Illuminate\Http\Request;

class HomeController extends Controller implements LayoutInterface
{
    use ControlsLayout, SimplePaginates;

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
            'featured_posts' =>  $this->featuredPosts(),
            'categories' => $this->categories(),
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
        return Post::featured()
                    ->published()
                    //->select('id', 'slug', 'title', 'summary', 'file_id', 'category_id', 'author_id', 'created_at')
                    ->reversedOrder()
                    ->take(10)
                    ->get();
        }

    /**
     * Get categories
     *
     * @return array
     */
    public function categories()
    {
        $categories = PostCategory::parentCategories()->get();

        $categories = $categories->map(function($category){

            $posts = $category->paginatedPosts(10);

            $category->posts_meta = $this->extractMetaFrom($posts);
            $category->posts = $this->extractItemsFrom($posts);

            return $category;
        });

        return $categories;
    }
}
