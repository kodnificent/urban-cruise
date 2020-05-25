<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\LayoutInterface;
use App\Http\Controllers\Utils\ControlsLayout;
use App\Http\Controllers\Utils\SimplePaginates;
use App\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller implements LayoutInterface
{
    use SimplePaginates, ControlsLayout;

    /**
     * @var \App\PostCategory
     */
    protected $category;

    public function read()
    {
        return abort(404);
    }

    /**
     * List all posts in a category
     *
     * @param \Illuminate\Http\Request $request
     * @param string $this->category
     * @param null|string $sub_category
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View|\Illuminate\Contracts\View\Factor
     */
    public function list(Request $request, string $category, ?string $sub_category = null)
    {
        // first we need to check that the parent category model exists
        $this->category = PostCategory::where('slug', $category)->firstOrFail();

        // next we check if this is a sub category route
        // if yes, the we assign the category value
        if ($sub_category) {
            $this->category = PostCategory::where('slug', $sub_category)->firstOrFail();
        }

        $posts = $this->category->paginatedPosts(10);

        $this->category->posts_meta = $this->extractMetaFrom($posts);
        $this->category->posts = $this->extractItemsFrom($posts);

        return $this->respond($request);
    }

    /**
     * Get the layout view name
     *
     * @return string
     */
    public function layout()
    {
        return 'layouts.list';
    }

    /**
     * Get the intended response data
     *
     * @return \App\PostCategory
     */
    public function data()
    {
        return $this->category;
    }

    /**
     * Get the intended response meta
     *
     * @return array
     */
    public function meta()
    {
        return [
            'seo_title' => "{$this->category->title} | ".settings('site_name'),
            'seo_description' => $this->category->description,
            'seo_canonical' => $this->category->url,
            'title' => $this->category->title,
            'description' => $this->category->description,
        ];
    }

    /**
     * Get the endpoints
     *
     * @return array
     */
    public function endpoints()
    {
        return [
            'base' => route('post.list', [
                'category' => '%category',
                'sub_category' => '%sub_category'
            ]),
        ];
    }
}
