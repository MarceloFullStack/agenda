<?php

namespace App\Model;

use App\Model\Cliente;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $table = 'contato';
    protected $primaryKey = 'id_contato';
    protected $fillable = [
        'ddd', 'telefone', 'cliente_id_cliente'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id_cliente', 'id_cliente');
    }
}
