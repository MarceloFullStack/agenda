<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            "nome" => "required",
            "tipo_pessoa" => "required",
            "cpf_cnpj" => "required|numeric",
            "email" => "required",
            "telefone" => "required|numeric",
            "cep" => "required|numeric",
            "logradouro" => "required",
            "numero" => "required|numeric",
            "complemento" => "required",
            "bairro" => "required",
            "cidade" => "required",
            "UF" => "required|max:2|string",
        ];
    }
    public function messages()
    {
        return [
            "nome.required" => "O campo nome é obrigatório",
            "cpf_cnpj.required" => "O campo CPF/CNPJ é obrigatório",
            "cpf_cnpj.numeric" => "O campo CPF/CNPJ deverá conter apenas números",
            "email.required" => "O campo E-mail é obrigatório",
            "telefone.required" => "O campo Telefone é obrigatório",
            "telefone.numeric" => "O campo Telefone deve conter apenas números",
            "cep.required" => "O campo CEP é obrigatório",
            "cep.numeric" => "O campo CEP só pode conter números",
            "logradouro.required" => "O campo LOGRADOURO é obrigatório",
            "numero.required" => "O campo Número é obrigatório",
            "numero.numeric" => "O campo Número deve ser numérico",
            "complemento.required" => "O campo COMPLEMENTO é obrigatório",
            "bairro.required" => "O campo BAIRRO é obrigatório",
            "UF.required" => "O campo UF é obrigatório",
            "UF.max" => "O campo UF deve ter apenas 2 letras",
            "UF.string" => "O campo UF só pode ser composto de letras",
            "cidade.required" => "O campo CIDADE é obrigatório",
        ];
    }
}
