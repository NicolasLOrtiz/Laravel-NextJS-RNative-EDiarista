<?php

namespace App\Rules;

use App\Services\ViaCEP;
use Illuminate\Contracts\Validation\Rule;

class ZipCodeValidate implements Rule
{
    public $viaCep;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(ViaCEP $viaCep)
    {
        $this->viaCep = $viaCep;
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
        $zip_code = str_replace('-', '', $value);
        return !! $this->viaCep->search($zip_code);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'CEP inválido';
    }
}
