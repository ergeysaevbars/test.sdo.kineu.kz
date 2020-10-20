<?php

namespace App\Rules;

use DOMDocument;
use Illuminate\Contracts\Validation\Rule;

class AllowableImageSize implements Rule
{
    const MAX_SIZE = 102400;
    const KB = 1024;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $doc = new DOMDocument();
        $doc->loadHTML($value);
        $image = $doc->getElementsByTagName('img')->item(0);

        if (is_null($image)) {
            return true;
        }

        $src = $image->getAttribute('src');

        return strlen(base64_decode($src)) <= self::MAX_SIZE;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Размер загружаемого изображения не должен превышать " . self::MAX_SIZE / self::KB . ' кб.';
    }
}
