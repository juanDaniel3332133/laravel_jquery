<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name'          => 'required|string|between:2,100',
            'description'   => 'nullable|string|max:250',
            'image'         => 'nullable|image|max:5200|mimes:jpeg,jpg,png',
            'categories_ids' => 'required|array',
            'categories_ids.*' => 'numeric|exists:categories,id',
        ];
    }

    public function attributes()
    {
        return [
            'name'          => 'Nombre',
            'description'   => 'Descripcion',
            'image'         => 'Imagen',
            'categories_ids'         => 'Categorias',
            'categories_ids.*'         => 'Categoria'
        ];
    }
}
