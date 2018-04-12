<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $id = $this->route('category');
        //$id = $category ? $category->id:NULL;
        return [
            'name' => "required|max:200|unique:categories,name,$id"
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O :attribute da Categoria e obrigratório!',
            'unique' => 'O :attribute da Categoria digitada já Existe!'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome',
        ];
    }
}
