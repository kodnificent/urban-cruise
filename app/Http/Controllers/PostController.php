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
                $category = PostCategory::where('slug', $sub_category)->firstOrFail();
            }

            $posts = Post::ofCategory($category)->published()->reversedOrder()->simplePaginate($request->query('limit'));
        } else {
            $posts = Post::published()->reversedOrder()->simplePaginate($request->query('limit'));
        }

        $data = $this->extractItemsFrom($posts);

        $meta = $this->extractMetaFrom($posts);

        return response()->json(compact('meta', 'data'), 200);
    }
}
