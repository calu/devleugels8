<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'kamernummer' => 'required | digits_between:1,999',
            'aantal_bedden' => 'required | digits_between : 1,6',
            'soort' => 'required | digits_between : 1,6',
            'beschrijving' => 'required | min : 6',
            'foto' => 'image'
        ];
    }
}
