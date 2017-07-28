<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'identity_id' => 'required|numeric',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:persons',
            'avatar' => 'image',
            'gender' => 'required',
            'birthdate' => 'required|date',
            'location' => 'required',
        ];
    }
}
