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
            'subtitle' => 'required|max:200',
            'price' => 'required|numeric',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id'
        ];
    }

    public function messages()
    {
        $result = [
            'required' => ':attribute do Livro é obrigratório!',
        ];
        $categories = $this->get('categories', []);
        $count = count($categories);
        if (is_array($categories) && $count >0) {
            foreach (range(0, $count-1) as $value) {
                $field = \Lang::get('validation.attributes.categories_*', [
                   'num' => $value + 1
                ]);
                $message = \Lang::get('validation.exists', [
                    'attribute' => $field
                ]);
                $result["categories.$value.exists"] = $message;
            }
        }
        return $result;
    }

    public function attributes()
    {
        return [
            'title' => 'Título',
            'subtitle' => 'Sub-Título',
            'price' => 'Preço',
            'categories' => 'Categoria'
        ];
    }
}
