<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContaReceber extends Model
{
    protected $table = 'contas_receber';
    protected $primaryKey = 'id';
    protected $fillable = [
        'atendimento_id',
        'forma_recebimento',
        'data_vencimento',
        'valor_original',
        'data_pagamento',
        'desconto',
        'valor_pago',
        'observacao',
    ];

    public function atendimento()
    {
        return $this->hasOne(Atendimento::class, 'id', 'atendimento_id');
    } 

    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'id', 'cliente_id');
    }

}