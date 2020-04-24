<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $table = 'contatos';
    protected $primaryKey = 'id';
    protected $fillable = [
           'nome',
           'cargo',
           'email',
           'telefone',
           'celular',
           'cliente_id',
        ];

     public function cliente()
    {
        return $this->hasOne(Cliente::class, 'id', 'cliente_id');
    }

}
