<?php

namespace App\Rules;

use App\Models\BadWord;
use Illuminate\Contracts\Validation\Rule;

class NoBadWords implements Rule
{
    protected $badWords;

    public function __construct()
    {
        $this->badWords = BadWord::all()->pluck('title')->toArray();
    }

    public function passes($attribute, $value)
    {
        foreach ($this->badWords as $badWord) {
            if (stripos($value, $badWord) !== false) {
                return false;  // Return false if a bad word is found
            }
        }
        return true;  // Return true if no bad words are found
    }

    public function message()
    {
        return 'Your comment contains inappropriate language.';  // Error message
    }
}
