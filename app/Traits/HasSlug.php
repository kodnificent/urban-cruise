<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use LogicException;

trait HasSlug
{

    /**
     * boot has slug trait
     *
     * @return void
     */
    public static function bootHasSlug()
    {
        static::verifyColumnFields();

        static::creating(function($model){
            static::slugMirrorListener($model);
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->slug);
        });
    }

    /**
     * Listener that sets the slug value to the mirror field
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public static function slugMirrorListener(Model $model)
    {
        $slugger = new static;

        $mirror_field = $slugger->slugMirror();

        $slug_field = $slugger->slugColumn();

        // search for duplicate mirror_fields irrespective of the string case
        $fields = static::whereRaw("LOWER($mirror_field) = ?", strtolower($model->{$mirror_field}))->where('id', '!=', $model->id)->get();

        if($fields->count() === 0){ // there are no duplicate fields
            $model->{$slug_field} = $slugger->slugify($model->{$mirror_field});
        } else {
            $model->{$slug_field} = $slugger->slugify($model->{$mirror_field}, $fields->count());
        }
    }

    /**
     * Verify that column fields are not null
     *
     * @return void
     * @throws InvalidArgumentExecption
     */
    public static function verifyColumnFields()
    {
        $_this = new static;
        $_this->verifySlugColumn();
        $_this->verifySlugMirror();
    }

    public function verifySlugColumn()
    {
        if(is_null($this->slugColumn())) throw new LogicException('slugColumn must return a string containing the column name. null was found');
    }

    public function verifySlugMirror()
    {
        if(is_null($this->slugMirror())) throw new LogicException('slugMirror must return a string containing the column name. null was found');
    }

    /**
     * Generate a url friendly slug from a given string
     *
     * @param string $string
     * @param null|string $prefix
     *
     * @return string
     */
    public static function slugify($string, $prefix = null)
    {
        return $prefix ? Str::slug($string).'-'.$prefix : Str::slug($string);
    }

    /**
     * Column name for the slug field
     *
     * @return string
     */
    public abstract function slugColumn();

    /**
     * Column name for the slug mirror
     *
     * @return string
     */
    public abstract function slugMirror();
}
