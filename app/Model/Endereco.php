<?php

namespace App\Model;

use App\Model\Bairro;
use App\Model\Cliente;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'endereco';
    protected $primaryKey = 'id_endereco';
    protected $fillable = [
        'cep', 'logradouro', 'numero', 'complemento', 'bairro_id_bairro', 'cliente_id_cliente'
    ];
    public function bairro()
    {
        return $this->belongsTo(Bairro::class, 'bairro_id_bairro', 'id_bairro');
    }
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id_cliente', 'id_cliente');
    }
}
