<?php

namespace CodeEduUser\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSettingRequest extends FormRequest
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
            'password' => "required|min:6|max:16|confirmed"
        ];
    }

    public function messages()
    {
        return [
            'required' => 'A :attribute do Usuário e obrigratória!',
            'unique' => 'A :attribute do Usuário digitado já Existe!'
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'Senha',
        ];
    }
}
