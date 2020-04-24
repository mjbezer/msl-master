<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContaPagar extends Model
{
    protected $table = 'contas_pagar';
    protected $primaryKey = 'id';
    protected $fillable = [
        'documento_fiscal',
        'data_documento_fiscal',
        'valor_original',
        'especie',
        'valor_pago',
        'data_vencimento',
        'data_pagamento',
        'observacao',
        'beneficiario',
    ];
}
