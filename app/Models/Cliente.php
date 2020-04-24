<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $fillable = [
           'nome',
           'cpf_cnpj',
           'rg_ie',
           'cep',
           'logradouro',
           'numero',
           'complemento',
           'bairro',
           'cidade',
           'codigo_municipio',
           'uf',
           'telefone',
           'celular',
           'email',
           'tipo_cliente',
           'tipo_fornecedor',
          'ativo'
        ];

    public function contatos()
    {
      return $this->hasMany(Contato::class, 'cliente_id', 'id');
    }

     public function equipamentos()
    {
      return $this->hasMany(Equipamento::class, 'cliente_id', 'id');
    }

     public function atendimentos()
    {
      return $this->hasMany(Atendimento::class, 'cliente_id', 'id');
    }


}
