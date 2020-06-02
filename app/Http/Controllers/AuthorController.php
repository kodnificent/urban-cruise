<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a single author
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function read(Request $request, $id)
    {
        $author = User::where('id', $id)->firstOrFail();

        $res = [
            'meta' => $this->meta($author),
            'data' => $author,
            'endpoints' => $this->endpoints($author)
        ];

        return $this->respond($res, $request, $this->layout());
    }

    public function layout()
    {
        return 'layouts.author.show';
    }

    public function shell()
    {
        return $this->shellResponse($this->layout(), $this->endpoints());
    }

    /**
     * Get the intended response meta
     *
     * @param \App\User $author
     * @return array
     */
    public function meta(User $author)
    {
        return [
            'seo_title' => "{$author->name}'s Profile | ".settings('site_name'),
            'seo_description' => "View {$author->name}'s profile, articles and many more. Connect with {$author->name} on ".settings('site_name'),
            'seo_canonical' => $author->url,
            'title' => $author->name,
        ];
    }

    /**
     * Get the endpoints
     *
     * @param null|\App\User $author
     * @return array
     */
    public function endpoints(?User $author = null)
    {
        return [
            'base' => route('author.read', [
                'id' => $author ? $author->id : '%id',
            ]),
            'author_posts' => route('category.posts', [
                'author' => $author ? $author->id : '%id'
            ])
        ];
    }
}
