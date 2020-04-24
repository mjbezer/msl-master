<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $table = 'equipamentos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'cliente_id',
        'tipo',
        'marca',
        'capacidade',
        'modelo',
        'serie',
        'localizacao',
        'obervacao',
        ];

    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'id', 'cliente_id');
    }
}
