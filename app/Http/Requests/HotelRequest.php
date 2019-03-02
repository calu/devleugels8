<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
{
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
        return [
           'start' => 'required | date | after : today',
           'einde' => 'required | date ', // moet later zijn dan start
           'kamernummer' => 'required | digits_between:1,999',
           'soort' => 'required'
        ];
    }
}
