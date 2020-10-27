<?php

namespace App\Model;

use App\Model\Contato;
use App\Model\Endereco;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'id_cliente';
    protected $fillable = [
        'nome', 'tipo_pessoa', 'cpf_cnpj','email',
    ];

    // custom save cliente

    public static function clientStore($data){
        $cliente = new Cliente;
        $cliente->nome = $data['nome'];
        $cliente->tipo_pessoa = $data['tipo_pessoa'];
        $cliente->cpf_cnpj = $data['cpf_cnpj'];
        $cliente->email = $data['email'];
        $cliente->save();
        $cliente_id = $cliente->id_cliente;

        $contato = new Contato();
        $contato->cliente_id_cliente = $cliente_id;
        $contato->ddd = substr($data['telefone'], 0, 2);
        $contato->telefone = substr($data['telefone'], 2);
        $contato->save();

        $cidade = new Cidade();
        $cidade->nome = $data['cidade'];
        $cidade->UF = mb_strtoupper(substr($data['UF'], 0, 2));
        $cidade->save();
        $id_cidade = $cidade->id_cidade;

        $bairro = new Bairro();
        $bairro->nome = $data['bairro'];
        $bairro->cidade_id_cidade = $id_cidade;
        $bairro->save();
        $id_bairro = $bairro->id_bairro;

        $endereco = New Endereco();
        $endereco->bairro_id_bairro = $id_bairro;
        $endereco->cliente_id_cliente = $cliente_id;
        $endereco->cep = $data['cep'];
        $endereco->logradouro = $data['logradouro'];
        $endereco->numero = $data['numero'];
        $endereco->complemento = $data['complemento'] ?? '';
        $endereco->save();
    }

    public function contato()
    {
        return $this->hasOne(Contato::class, 'cliente_id_cliente', 'id_cliente');
    }
    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'cliente_id_cliente', 'id_cliente');
    }
}
