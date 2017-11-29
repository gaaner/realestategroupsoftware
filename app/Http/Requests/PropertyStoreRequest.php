<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyStoreRequest extends FormRequest
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
            'title' => 'required',
            'code' => 'required',
            'type' => 'required|in:1,2',
            'cep' => 'required',
            'rua' => 'required',
            'city' => 'required',
            'state' => 'required',
            'neighborhood' => 'required',
            'number' => 'required',
            'complement' => 'required',
            'price' => 'required|numeric',
            'area' => 'required|numeric',
            'rooms' => 'required|numeric',
            'suites' => 'required|numeric',
            'bathrooms' => 'required|numeric',
            'living_rooms' => 'required|numeric',
            'description' => 'required',
            'image' => 'image'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Título',
            'code' => 'Código',
            'type' => 'Tipo',
            'cep' => 'CEP',
            'rua' => 'Rua (Logradouro)',
            'city' => 'Cidade',
            'state' => 'Estado',
            'neighborhood' => 'Bairro',
            'number' => 'Número',
            'complement' => 'Complemento',
            'price' => 'Preço',
            'area' => 'Área',
            'rooms' => 'Quartos (dormitórios)',
            'suites' => 'Suítes',
            'bathrooms' => 'Banheiros',
            'living_rooms' => 'Salas',
            'description' => 'Descrição',
            'image' => 'Imagem'
        ];
    }
}
