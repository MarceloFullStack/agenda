<?php

namespace App\Model;

use App\Model\Bairro;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'cidade';
    protected $primaryKey = 'id_cidade';
    protected $fillable = [
        'nome', 'UF'
    ];
    // public function bairro()
    // {
    //     return $this->hasOne(Bairro::class, 'id_cidade', 'bairro_id_bairro');
    // }
}
