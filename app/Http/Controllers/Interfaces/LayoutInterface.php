<?php

namespace App\Http\Controllers\Interfaces;

interface LayoutInterface
{
    /**
     * Get the skeleton view of the layout
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function skeleton();

    /**
     * Get the name of the layout
     *
     * @return string
     */
    public function layout();

    /**
     * Get endpoints for the layout
     *
     * @return array
     */
    public function endpoints();

    /**
     * Get the meta information of the layout
     *
     * @return array
     */
    public function meta();

    /**
     * Get the data
     */
    public function data();
}
