<?php

namespace App\Nova\Metrics;

use App\Nova\News;
use NovaListCard\ListCard;

class RecentArticles extends ListCard
{
    /**
     * Setup the card options
     */
    public function __construct()
    {
        $this->resource(News::class)
            ->heading('Recent News Articles')
            //->orderBy('id', 'desc')
            //->timestamp()
            //->viewAll();
            ;
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'recent-articles';
    }
}
