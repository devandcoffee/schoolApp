<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TutorRequest extends FormRequest
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
        $rules = [
            'identity_id'   => 'required|numeric|unique:persons',
            'firstname'     => 'required',
            'lastname'      => 'required',
            'avatar'        => 'image',
            'gender'        => 'required',
            'birthdate'     => 'required|date_format:d-m-Y',
            'address'       => 'required',
            'mobile_phone'  => 'nullable|numeric',
            'home_phone'    => 'nullable|numeric',
            'job_phone'     => 'nullable|numeric',
        ];

        switch($this->method())
        {
            case 'POST':
            {
                $rules['email'] = 'required|email|unique:persons';
                break;
            }
            case 'PUT':
            {
                $rules['email'] = 'required|email';
                break;
            }
            default:
                break;
        }

        return $rules;
    }
}