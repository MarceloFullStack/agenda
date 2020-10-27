<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    protected $table = 'bairro';
    protected $primaryKey = 'id_bairro';
    protected $fillable = [
        'nome', 'cidade_id_cidade'
    ];
    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'cidade_id_cidade', 'id_cidade');
    }
}
