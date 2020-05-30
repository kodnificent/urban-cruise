<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Utils\SimplePaginates;
use App\Post;
use App\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use SimplePaginates;

    /**
     * Get a list of posts based on the category
     *
     * @param \Illuminate\Http\Request $request
     * @param string $category
     * @param null|string $sub_category
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request, ?string $category = null, ?string $sub_category = null)
    {
        if (! $request->expectsJson()) {
            abort(404);
        }

        if ($category) {

            // first we need to check that the parent category model exists
            $category = PostCategory::where('slug', $category)->firstOrFail();

            // next we check if this is a sub category route
            // if yes, the we assign the category value
            if ($sub_category) {
                $category = $category->children()->where('slug', $sub_category)->firstOrFail();
            }

            $posts = Post::ofCategory($category)->published()->reversedOrder()->simplePaginate($request->query('limit'));
        } else {
            $posts = Post::published()->reversedOrder()->simplePaginate($request->query('limit'));
        }

        $data = $this->extractItemsFrom($posts);

        $meta = $this->extractMetaFrom($posts);

        return response()->json(compact('meta', 'data'), 200);
    }

    /**
     * Read a single post
     *
     * @param \Illuminate\Http\Request $request
     * @param string $category
     * @param string $sub_category
     * @param string $slug
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function read(Request $request, $category, $sub_category, $slug)
    {
        $category = PostCategory::where('slug', $category)->firstOrFail();

        $category = $category->children()->where('slug', $sub_category)->firstOrFail();

        $post = $category->posts()->where('slug', $slug)->firstOrFail();

        $prev_post = Post::where('category_id', $post->category->id)->where('id', '<', $post->id)->select('id', 'slug', 'title', 'category_id')->first();

        $next_post = Post::where('category_id', $post->category->id)->where('id', '>', $post->id)->select('id', 'slug', 'title', 'category_id')->first();

        $res = [
            'meta' => $this->meta($post),
            'data' => $post,
            'prev_post' => $prev_post,
            'next_post' => $next_post
        ];

        return $this->respond($res, $request, $this->layout());
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
    public function layout()
    {
        return 'layouts.category.post';
    }

    /**
     * Get the intended response meta
     *
     * @param \App\Post $post
     * @return array
     */
    public function meta(Post $post)
    {
        return [
            'seo_title' => "{$post->title} | ".settings('site_name'),
            'seo_description' => $post->summary,
            'seo_canonical' => $post->url,
            'title' => $post->title,
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
            'base' => route('category.post', [
                'category' => '%category',
                'sub_category' => '%sub_category',
                'slug' => '%slug'
            ])
        ];
    }
}
