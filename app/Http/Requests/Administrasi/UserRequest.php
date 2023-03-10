<?php

namespace App\Http\Requests\Administrasi;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', Rule::unique('users')->ignore($this->user) ],
            'name' => ['required'],
            'password' => ['required', 'min:7'],
        ];
    }
}
