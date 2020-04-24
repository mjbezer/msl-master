<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;

class ContatoController extends Controller
{

    public function create($cliente_id)
    {
       return view('contatos.create',['cliente_id'=>$cliente_id]);
    }

    public function store(Request $request)
    {
        $request= $request->all();
        $insertContato = Contato::create($request);
        return $insertContato;
    }

    public function storeByClient($request):void
    {
        $insertContato = Contato::create($request);
    }

    public function edit($id)
    {
        $contato =  Contato::find($id);
        return view('contatos.edit',['contato'=>$contato]);

    }

    public function getById($id)
    {
        $contato = Contato::find($id);
       return view('contato.show',['contato'=>$contato]);

    }

     public function update(Request $request, $id)
    {
        $request = $request->all();
        $contatoUpdate = Contato::find($id);
        $contatoUpdate->update($request);
        return redirect('/cliente/show/'.$contatoUpdate->cliente_id);
    }

    public function destroy($id)
    {
        $contatoDelete = Contato::find($id);
        $contatoDelete->delete();
        return $$contatoDelete;
    }
}
