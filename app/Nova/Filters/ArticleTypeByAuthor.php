<?php

namespace App\Nova\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class ArticleTypeByAuthor extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        $query = $query->where('author_id', $request->user()->id);

        if (in_array($value, ['draft', 'under-review', 'published'])) {
            $query = $query->where('status', $value);
        }

        if ($value === 'featured') {
            $query = $query->where('featured', 1);
        }

        return $query;
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return [
            'All My Articles' => 'all',
            'My Draft Articles' => 'draft',
            'My published Articles' => 'published',
            'My Articles Under Review' => 'under-review',
            'My Featured Articles' => 'featured',
        ];
    }
}
