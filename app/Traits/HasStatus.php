<?php

namespace App\Traits;

trait HasStatus
{
    /**
     * boot has status trait
     *
     * @return void
     */
    public static function bootHasStatus()
    {
        static::saving(function($model){
            if ($model->status === 'published' && is_null($model->getOriginal('published_at'))) {
                $model->published_at = now();
            }
        });
    }

    /**
     * Mark the post as published
     *
     * @return $this
     */
    public function markAsPublished()
    {
        if ($this->status === 'published') {
            return;
        }

        $this->status = 'published';
        $this->published_at = $this->published_at ? $this->published_at : now();
        $this->reviewer_id = request()->user()->id;
        $this->save();

        return $this;
    }

    /**
     * Mark the post as draft
     *
     * @return $this
     */
    public function markAsDraft()
    {
        if ($this->status === 'draft') {
            return;
        }

        $this->status = 'draft';
        $this->save();

        return $this;
    }

    /**
     * Submit the post for review
     *
     * @return $this
     */
    public function submitForReview()
    {
        if ($this->status === 'under-review') {
            return;
        }

        $this->status = 'under-review';
        $this->save();

        return $this;
    }
}
