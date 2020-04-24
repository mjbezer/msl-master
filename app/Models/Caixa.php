<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caixa extends Model
{
    protected $table = 'caixas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'ano',
        'mes',
        'previsto',
        'realizado',
        'receita_despesa',
    ];
}
