<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class WordCount implements Rule
{
    protected $maxWords;
    public function __construct($maxWords = 601)
    {
        $this->maxWords = $maxWords;
    }
    public function passes($attribute, $value)
    {
        $wordCount = str_word_count($value);
        return $wordCount <= $this->maxWords;
    }
    public function message()
    {
        return 'The :attribute must not exceed ' . $this->maxWords . ' words.';
    }
}
