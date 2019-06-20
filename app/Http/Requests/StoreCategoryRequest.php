<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => ['min:2', 'max:255',],
        ];
    }
    public function messsages(){
        return [
            'required' => ':attribute is required',
            'min' => ':attribute is more than 2 letters',
            'max' => ':attribute is less than 255 letters',
        ];
    }
    public function attributes(){
        return [
            'name' => 'Category name',
        ];
    }
}
