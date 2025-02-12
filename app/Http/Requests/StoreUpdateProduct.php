<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //tem que colocar true se não, não valida
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => [
                'required',
                'min:3',
                'max:255',
                'unique:products'

            ],
            'description' => [
                'required',
                'min:3',
                'max:10000',
            ],
            'price' => [
                'required',
                'numeric',
                'min:0.01',
            ],
            'category_id' => [
                'required',
            ] 
        ];

        //adiciona uma excesão quando for atualizar e não mexer se for o mesmo
        //"unique:tabela,coluna,ignorar_id,coluna_de_id"
        //"unique:products,name,{$this->id},id"
        if($this->method() === 'PUT' || $this->method() === 'PATCH'){

            $rules['name'] = [
                'required',
                'min:3',
                'max:255',
                Rule::unique('products')->ignore($this->product ?? $this->id),
            ];
        }
        return $rules;
    }
}
