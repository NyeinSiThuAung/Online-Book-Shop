<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'name' => 'required|unique:books|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'price' => 'required',
            'category_id' => 'required',
            'author_id' => 'required',
        ];
    }
}
