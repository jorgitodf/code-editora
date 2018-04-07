<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
        $book = $this->route('books');
        $id = $book ? $book->id:NULL;
        return [
            'title' => "required|max:200|required:books,title,$id",
            'subtitle' => "required|max:200",
            'price' => "required|max:200"
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O :attribute do Título do Livro é obrigratório!',
            'required' => 'O :attribute do Sub-Título do Livro é obrigratório!',
            'required' => 'O :attribute do Livro é obrigratório!',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Título',
            'subtitle' => 'Sub-Título',
            'price' => 'Preço'
        ];
    }
}
