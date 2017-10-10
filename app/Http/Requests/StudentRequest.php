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

    public function messages()
    {
        $person_messages = [
            'person.identity_id.required'  => __('messages.persons.validations.identity_id.required'),
            'person.identity_id.numeric'   => __('messages.persons.validations.identity_id.numeric'),
            'person.firstname.required'    => __('messages.persons.validations.firstname.required'),
            'person.lastname.required'     => __('messages.persons.validations.lastname.required'),
            'person.avatar.image'          => __('messages.persons.validations.avatar.image'),
            'person.birthdate.required'    => __('messages.persons.validations.birthdate.required'),
            'person.birthdate.date_format' => __('messages.persons.validations.birthdate.date_format', ['format' => 'd-m-Y']),
            'person.address.required'      => __('messages.persons.validations.address.required'),
            'person.mobile_phone.numeric'  => __('messages.persons.validations.mobile_phone.numeric'),
            'person.home_phone.numeric'    => __('messages.persons.validations.home_phone.numeric'),
            'person.email.required'        => __('messages.persons.validations.email.required'),
            'person.email.email'           => __('messages.persons.validations.email.email'),
            'person.email.unique'          => __('messages.persons.validations.email.unique'),
        ];

        $tutor_messages = [];
        for ($i=1; $i < 3; $i++) {
            $tutor = 'tutor' . $i;
            $tutor_messages[$i] = [
                $tutor.'.person.identity_id.required'  => __('messages.tutors.validations.identity_id.required', ['num' => $i]),
                $tutor.'.person.identity_id.numeric'   => __('messages.tutors.validations.identity_id.numeric', ['num' => $i]),
                $tutor.'.person.firstname.required'    => __('messages.tutors.validations.firstname.required', ['num' => $i]),
                $tutor.'.person.lastname.required'     => __('messages.tutors.validations.lastname.required', ['num' => $i]),
                $tutor.'.person.avatar.image'          => __('messages.tutors.validations.avatar.image', ['num' => $i]),
                $tutor.'.person.birthdate.date_format' => __('messages.tutors.validations.birthdate.date_format', ['num' => $i, 'format' => 'd-m-Y']),
                $tutor.'.person.mobile_phone.numeric'  => __('messages.tutors.validations.mobile_phone.numeric', ['num' => $i]),
                $tutor.'.person.home_phone.numeric'    => __('messages.tutors.validations.home_phone.numeric', ['num' => $i]),
                $tutor.'.person.email.required'        => __('messages.tutors.validations.email.required', ['num' => $i]),
                $tutor.'.person.email.email'           => __('messages.tutors.validations.email.email', ['num' => $i]),
                $tutor.'.person.email.unique'          => __('messages.tutors.validations.email.unique', ['num' => $i]),
            ];
        }

        $messages = array_merge($person_messages, $tutor_messages[1], $tutor_messages[2]);
        return $messages;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $person_rules = [
            'person.identity_id'  => 'required|numeric',
            'person.firstname'    => 'required',
            'person.lastname'     => 'required',
            'person.avatar'       => 'image',
            'person.birthdate'    => 'required|date_format:d-m-Y',
            'person.address'      => 'required',
            'person.mobile_phone' => 'nullable|numeric',
            'person.home_phone'   => 'nullable|numeric',
        ];

        $tutor_rules = [];
        for ($i=1; $i < 3; $i++) {
            $tutor = 'tutor' . $i;
            $tutor_rules[$i] = [
                $tutor.'.person.identity_id'  => 'required|numeric',
                $tutor.'.person.firstname'    => 'required',
                $tutor.'.person.lastname'     => 'required',
                $tutor.'.person.avatar'       => 'image',
                $tutor.'.person.birthdate'    => 'nullable|date_format:d-m-Y',
                $tutor.'.person.mobile_phone' => 'nullable|numeric',
                $tutor.'.person.home_phone'   => 'nullable|numeric',
            ];
            switch($this->method())
            {
                case 'POST':
                {
                    $tutor_rules[$i][$tutor.'.person.email'] = 'required|email|unique:persons';
                    break;
                }
                case 'PUT':
                {
                    $tutor_rules[$i][$tutor.'.person.email'] = 'required|email';
                    break;
                }
                default:
                    break;
            }
        }

        switch($this->method())
        {
            case 'POST':
            {
                $person_rules['person.email'] = 'required|email|unique:persons';
                break;
            }
            case 'PUT':
            {
                $person_rules['person.email'] = 'required|email';
                break;
            }
            default:
                break;
        }

        $rules = array_merge($person_rules, $tutor_rules[1], $tutor_rules[2]);
        return $rules;
    }
}
