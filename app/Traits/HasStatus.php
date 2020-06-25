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
        $this->reviewed_by = request()->user()->id;
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
}
