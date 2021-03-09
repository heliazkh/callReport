<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUser extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required','email', Rule::unique('users')->ignore($this->route('user'))],
            'mobile' => 'required|numeric',
            'username' => ['required', Rule::unique('users')->ignore($this->route('user'))],
            'password' =>  ($this->method() == 'POST' ? 'required|min:6':''),
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'first_name' => trans('site.firstName'),
            'last_name' => trans('site.lastName'),
            'email' => trans('site.email'),
            'mobile' => trans('site.mobile'),
            'username' => trans('site.username'),
            'password' => trans('site.password'),
        ];
    }
}
