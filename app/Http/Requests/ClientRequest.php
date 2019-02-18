<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;


class ClientRequest extends FormRequest
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
                'voornaam' => 'required | min:2',
                'familienaam' => 'required | min:2',
                'straat' => 'required',
                'huisnummer' => 'required',
                'postcode' => 'required',
                'gemeente' => 'required',
                'email' => 'email | required',
                'password' => 'min:6 | confirmed',
                'geboortedatum' => 'before:"now" | required',
                'RRN' => 'required',
                'mutualiteit' => 'required',       
        ];
    }
    
    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->notUniqueEmail($this->email)) {
                $validator->errors()->add('email', 'dit email-adres bestaat reeds');
            }
        });
    }
    
    public function notUniqueEmail($email)
    {
        return DB::table('users')->where('email', $email)->exists();
    }
    
}
