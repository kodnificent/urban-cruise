<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class WordCount implements Rule
{
    /**
     * Min number of word count
     *
     * @var int
     */
    protected $min;

    /**
     * Max number of word count
     */
    protected $max;

    /**
     * Create a new rule instance.
     *
     * @param null|int $min
     * @param null|int $max
     * @return void
     */
    public function __construct(?int $min = null, ?int $max = null)
    {
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $count = str_word_count($value);

        if ($this->min && $count < $this->min) {
            return false;
        }

        if ($this->max && $count > $this->max) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if ($this->min && $this->max) {
            return "The :attribute must be a minimum of {$this->min} word(s) and a maximum {$this->max} word(s).";
        }

        if ($this->min) {
            return "The :attribute must be a minimum {$this->min} word(s).";
        }

        if ($this->max) {
            return "The :attribute must be a maximum of {$this->max} word(s).";
        }
    }
}
