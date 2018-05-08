<?php

namespace CodeEduUser\Http\Requests;

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
        $id = $this->route('user');
        //$id = $category ? $category->id:NULL;
        return [
            'name' => "required|max:255",
            'email' => "required|max:200|unique:users,email,$id"
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O :attribute do Usuário e obrigratório!',
            'unique' => 'O :attribute do Usuário digitado já Existe!'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome',
        ];
    }
}
