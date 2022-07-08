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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'disponible' => 'required|boolean',
            'library_id' => 'required|integer|exists:libraries,id',
            'category_id' => 'required|integer|exists:categories,id',
            'author_id' => 'required|integer|exists:authors,id',
        ];
    }
}
