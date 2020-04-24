<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atendimento;
use App\Job\JobMailSchedulle;

class AtendimentoController extends Controller
{
    public function index()
    {
        $atendimentos = Atendimento::all();
        return view('atendimentos.index', ['atendimentos'=>$atendimentos]);
    } 

    public function create()
    {
        return view('atendimento.create');
    } 

    public function createByClient($cliente_id) 
    {

        return view('atendimentos.create', ['cliente_id'=>$cliente_id]);
    }

    public function createByEquipment($equipamento_id) 
    {
        return view('atendimentos.create', ['equipamento_id'=>$equipamento_id]);
    }

    public function store(Request $request)
    {
        $request =$request->all();
        $insertAtendimento = Atendimento::create($request);
        ContaReceberController::storeBySchedulle($insertAtendimento->id);
        $emailCliente = $insertAtendimento->cliente->email;
        if ($emailCliente){
            JobMailSchedulle::dispatch($emailCliente,
                                      $insertAtendimento);
        }
        return redirect('/cliente/show/'.$insertAtendimento->cliente_id);
    }

    public function edit($id)
    {
        $atendimento = Atendimento::find($id);
        return view('atendimentos.edit', ['atendimento'=>$atendimento]);
    }
    public function update(Request $reques, $id)
    {
        $request = $request->all();
        $updateAtendimento = Atendimento::find($id);
        $updateAtendimento->update($request);
        ContaReceberController::updateBySchedulle($id, $request);
        return redirect('/cliente/show/'. $updateAtendimento->cliente_id);
    }

      public function destroy($id)
    {
        $deleteAtendimento = Atendimento::find($id);
        ContaReceberController::destroyBySchedulle($deleteAtendimento, $request);
        $deleteAtendimento->delete();
        return $$deleteAtendimento;
    }

}