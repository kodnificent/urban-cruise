<?php

namespace App\Http\Controllers;

use App\PostCategory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Respond to the request
     *
     * @param array $res
     * @param null|Illuminate\Http\Request $request
     * @param null|string $layout
     * @return Illuminate\Http\JsonResponse|Illuminate\View\View|Illuminate\Contracts\View\Factory
     */
    protected function respond(array $res, ?Request $request = null, ?string $layout = null)
    {
        $request = $request ?? request();

        $res['is_shell'] = false;

        $res['primary_menu'] = $this->primaryMenu();

        $res['social_links'] = $this->socialLinks();

        $res['categories'] = $this->categories();

        $res['endpoints']['posts'] = route('category.posts');

        if ($request->expectsJson()) {
            return response()->json($res, 200);
        } else {
            return view($layout, compact('res'));
        }
    }

    /**
     * Respond with a shell view
     *
     * @param string $layout
     * @param array $endpoints
     * @return \Illuminate\View\View
     */
    public function shellResponse($layout, $endpoints = [])
    {
        $endpoints['posts'] = route('category.posts');

        $res = [
            'endpoints' => $endpoints,
            'is_shell' => true,
            'primary_menu' => $this->primaryMenu(),
            'social_links' => $this->socialLinks(),
            'categories' => $this->categories(),
        ];

        return view($layout, compact('res'));
    }

    public function socialLinks()
    {
        return [
            'facebook' => settings('facebook'),
            'instagram' => settings('instagram'),
            'twitter' => settings('twitter')
        ];
    }

    /**
     * Navigation links for primary menu
     *
     * @return array
     */
    public function primaryMenu()
    {
        $menu = [];

        $menu[] = [
                    'name' => 'Home',
                    'url' => route('home'),
                    'active' => request()->is( extractPath(route('home')) )
                ];

        $categories = PostCategory::parentCategories()->get();
        $categories = $categories->filter(function ($category) {
            return $category->hasAtleastOnePost();
        });


        foreach ($categories as $category) {
            $menu[] = [
                'name' => $category->title,
                'url' => $category->url,
                'active' => request()->is( extractPath($category->url).'*' )
            ];
        }

        $menu[] = [
            'name' => 'About Us',
            'url' => route('about-us'),
            'active' => request()->is( extractPath(route('about-us')) )
        ];

        $menu[] = [
            'name' => 'Write for Us',
            'url' => route('write-for-us'),
            'active' => request()->is( extractPath(route('write-for-us')) )
        ];

        return $menu;
    }

    public function categories()
    {
        $categories = PostCategory::parentCategories()->with(['children'])->get();
        $categories = $categories->filter(function ($category) {
            return $category->hasAtleastOnePost();
        });

        return $categories;
    }
}
