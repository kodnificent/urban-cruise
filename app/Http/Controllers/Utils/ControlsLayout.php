<?php

namespace App\Http\Controllers\Utils;

use Illuminate\Http\Request;

trait ControlsLayout
{
    /**
     * Respond to the request
     *
     * @param null|Illuminate\Http\Request $request
     * @return Illuminate\Http\JsonResponse|Illuminate\View\View|Illuminate\Contracts\View\Factory
     */
    protected function respond(?Request $request = null)
    {
        $request = $request ?? request();

        $res = $this->responseData();

        if ($request->expectsJson()) {
            return response()->json($res, 200);
        } else {
            return view($this->layout(), compact('res'));
        }
    }

    protected function responseData()
    {
        $meta = $this->meta();

        $data = $this->data();

        $endpoints = $this->endpoints();

        $is_skeleton = false;

        return compact('meta', 'data', 'endpoints', 'is_skeleton');
    }

    /**
     * Get the skeleton view of the home page
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function skeleton()
    {
        return view($this->layout(), [
            'res' => [
                'endpoints' => $this->endpoints(),
                'is_skeleton' => true
            ]
        ]);
    }
}
