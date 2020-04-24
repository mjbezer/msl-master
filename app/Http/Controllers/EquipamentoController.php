<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamento;

class EquipamentoController extends Controller
{
     public function create($cliente_id)
    {
       return view('equipamentos.create',['cliente_id'=>$cliente_id]);
    }


    public function store(Request $request)
    {
        $request= $request->all();
        $insertEquipamento = Equipamento::create($request);
        return $insertEquipamento;
    }

    public function storeByCliente($request):void
    {
        $insertEquipamento = Equipamento::create($request);
    }

    public function edit($id)
    {
        $equipamento =  Equipamento::find($id);
        return view('equipamentos.edit',['equipamento'=>$equipamento]);

    }

    public function getById($id)
    {
        $equipamento = Equipamento::find($id);
       return view('Equipamento.show',['Equipamento'=>$equipamento]);

    }

     public function update(Request $request, $id)
    {
        $request = $request->all();
        $equipamentoUpdate = Equipamento::find($id);
        $equipamentoUpdate->update($request);
        return redirect('/cliente/show/'.$equipamentoUpdate->cliente_id);
    }

    public function destroy($id)
    {
        $equipamentoDelete = Equipamento::find($id);
        $equipamentoDelete->delete();
        return $$equipamentoDelete;
    }
}
