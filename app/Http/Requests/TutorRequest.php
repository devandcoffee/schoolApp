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

        switch($this->method())
        {
            case 'POST':
            {
                $rules = [
                    'identity_id'   => 'required|numeric|unique:persons',
                    'firstname'     => 'required',
                    'lastname'      => 'required',
                    'email'         => 'required|email|unique:persons',
                    'avatar'        => 'image',
                    'gender'        => 'required',
                    'birthdate'     => 'required|date_format:d-m-Y',
                    'address'       => 'required',
                    'mobile_phone'  => 'nullable',
                    'home_phone'    => 'nullable',
                    'job_phone'     => 'nullable',
                ];
                break;
            }
            case 'PUT':
            {
                $rules = [
                    'identity_id'   => 'required|numeric',
                    'firstname'     => 'required',
                    'lastname'      => 'required',
                    'email'         => 'required|email',
                    'avatar'        => 'image',
                    'gender'        => 'required',
                    'birthdate'     => 'required|date_format:d-m-Y',
                    'address'       => 'required',
                    'mobile_phone'  => 'nullable',
                    'home_phone'    => 'nullable',
                    'job_phone'     => 'nullable',
                ];
                break;
            }
            default:
                break;
        }

        return $rules;
    }
}
