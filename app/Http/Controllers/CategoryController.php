<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Utils\SimplePaginates;
use App\PostCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use SimplePaginates;

    /**
     * @var \App\PostCategory
     */
    protected $category;

    /**
     * Show a single post of a category
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function post()
    {
        return abort(404);
    }

    /**
     * Show details of a category
     *
     * @param \Illuminate\Http\Request $request
     * @param string $category
     * @param null|string $sub_category
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View|\Illuminate\Contracts\View\Factor
     */
    public function show(Request $request, string $category, ?string $sub_category = null)
    {
        // first we need to check that the parent category model exists
        $this->category = PostCategory::where('slug', $category)->with(['parent', 'children'])->firstOrFail();

        // next we check if this is a sub category route
        // if yes, the we assign the category value
        if ($sub_category) {
            $this->category = PostCategory::where('slug', $sub_category)->with(['parent', 'children'])->firstOrFail();
        }

        $res = [
            'meta' => $this->meta(),
            'endpoints' => $this->endpoints(),
            'data' => $this->data(),
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
        return 'layouts.category.show';
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
            'base' => route('category.show', [
                'category' => '%category',
                'sub_category' => '%sub_category'
            ])
        ];
    }
}
