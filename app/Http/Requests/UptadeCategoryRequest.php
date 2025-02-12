<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UptadeCategoryRequest extends FormRequest
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
     * Ignora quando for o mesmo nome
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {   
        $rules = [
            'name'=>[
                'required',
                'min:3',
                'max:10000',
                Rule::unique('categories')->ignore($this->id)
            ],
            'description'=>[
                'required',
                'min:3',
                'max:10000'
            ]
        ];
        return $rules;
    }
}
