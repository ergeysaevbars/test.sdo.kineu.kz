<?php

namespace App\Rules;

use DOMDocument;
use Illuminate\Contracts\Validation\Rule;

class OnlyOneImage implements Rule
{
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
        $images = $doc->getElementsByTagName('img');

        return $images->length < 2;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Вы не можете загрузить более одного изображения.';
    }
}
