<?php

namespace App\Http\Requests;

use App\Rules\CategoryRule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_name'=>['required',new CategoryRule],
            'category_slug'=>'required|unique:categories',
            'image'=>'required|mimes:jpg,png,gif|max:3000|dimensions:min_width:100,min_height:100,
            max_width:1000,max_height:1000',
        ];
    }
    protected $stopOnFirstFailure = true;
    // protected function prepareForValidation(){
    //     $this->merge([
    //         'category_name'=> strtolower($this->category_name)
    //     ]);
    // }
    public function attributes()
    {
        return [
            'category_name'=> 'Category Name',
            'category_slug'=> 'Category Slug',
            'image'=> 'Image',
        ];
    }
    public function messages()
    {
        return [
            'category_name.required'=>':attribute field is required.',
            'category_slug.required'=>':attribute field is required.'
        ];
    }
}
