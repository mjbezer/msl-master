<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    protected $table = 'atendimentos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'cliente_id',
        'contato_id',
        'tecnico_id',
        'equipamento_id',
        'numero_atendimento',
        'tipo_atendimento',
        'ocorrencia',
        'laudo',
        'acao_corretiva',
        'data_atendimento',
        'data_vencimento',
        'valor',
    ];

    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'id', 'cliente_id');
    }

    public function contato()
    {
        return $this->hasOne(Contato::class, 'id', 'contato_id');
    }

    public function equipamento()
    {
        return $this->hasOne(Equipamento::class, 'id', 'equipamento_id');
    } 

    public function tecnico()
    {
        return $this->hasOne(Tecnico::class, 'id', 'tecnico_id');
    }
}
