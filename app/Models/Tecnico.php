<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    protected $table = 'tecnicos';
    protected $primaryKey = 'id';
    protected $fillable = [
            'nome',
            'email',
            'cpf',
            'rg',
            'habilitacao',
            'vencimento_habilitação',
            'endereco',
            'bairro',
            'cep',
            'cidade',
            'uf',
            'fone',
            'celular'
    ];
}
