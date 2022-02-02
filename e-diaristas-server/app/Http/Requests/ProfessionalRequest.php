<?php

namespace App\Http\Requests;

use App\Rules\ZipCodeValidate;
use App\Services\ViaCEP;
use Illuminate\Foundation\Http\FormRequest;

class ProfessionalRequest extends FormRequest
{
    protected $viaCep;

    public function __construct(ViaCEP $viaCep)
    {
        $this->viaCep = $viaCep;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'full_name' => ['required', 'max:100'],
            'document' => ['required', 'size:14'],
            'email' => ['required', 'email', 'max:100'],
            'phone' => ['required', 'size:15'],
            'address' => ['required', 'max:255'],
            'number' => ['required', 'max:20'],
            'neighborhood' => ['required', 'max:50'],
            'city' => ['required', 'max:50'],
            'state' => ['required', 'size:2'],
            'zip_code' => ['required', new ZipCodeValidate($this->viaCep)],
            'avatar' => ['image']
        ];

        if($this->isMethod('post')) {
            $rules['avatar'] = ['required', 'image'];
        }

        return $rules;
    }
}
