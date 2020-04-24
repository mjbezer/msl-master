<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';
    protected $primaryKey = 'id';
    protected $fillable = [
       'inicio',
       'fim',
       'status_agenda',
       'observacao',
       'atendimento_id',
    ];

    public function atendimento()
    {
        return $this->hasOne(Atendimento::class, 'id', 'atendimento_id');
    } 
}