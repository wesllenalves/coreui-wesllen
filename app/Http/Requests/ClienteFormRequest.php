<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
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
        /** regras de dados passado pelo formularios que serao aceitos */
        return [
            'name' => 'required|min:3|max:100',
            'cpf' => 'required|numeric|min:11|max:11',
            'telefone' => 'required|numeric|min:11|max:11',
            'email' => 'required|email',
            'endereco' => 'required|max:100',
            'cidade' => 'required|max:100'
        ];
    }

    public function messages()
    {   
        /** Possiveis menssagens de erro personalizadas*/
        return [
            'name.required' => 'O campo nome é de preenchimento obrigatorio.',
            'name.min' => 'O campo nome é de preenchimento de pelo menos 3 caracteres.',
            'name.max' => 'O campo nome é de preenchimento de no maximo 100 caracteres.',
            'cpf.required' => 'O campo cpf é de preenchimento obrigatorio.',
            'cpf.numeric' => 'O campo cpf deve ser preenchido somente com numeros.',
            'cpf.min' => 'O campo cpf deve ter no minimo 11 numeros.',
            'cpf.max' => 'O campo cpf deve ter no maximo 11 numeros.',
            'telefone.required' => 'O campo telefone é de preenchimento obrigatorio.',
            'telefone.numeric' => 'O campo telefone é de preenchimento somente com  numeros.',
            'telefone.min' => 'O campo telefone deve possuir no minimo 11 numeros.',
            'telefone.max' => 'O campo telefone deve possuir no maximo 11 numeros.',
            'email.required' => 'O campo email é de preenchimento obrigatorio.',
            'endereco.required' => 'O campo endereco é de preenchimento obrigatorio.',
            'complemento.required' => 'O campo complemento é de preenchimento obrigatorio.'
        ];
    }
}
