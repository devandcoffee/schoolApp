<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'email' => 'required|email',
            'avatar' => 'image',
            'gender' => 'required',
            'birthdate' => 'required|date_format:d-m-Y',
            'location' => 'required',
        ];
    }
}
