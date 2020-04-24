<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Http\Controllers\ContatoController;
use Facade\FlareClient\Http\Client;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index',['clientes'=> $clientes]);
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request= $request->all();
        $insertCliente = Cliente::create($request);
        return redirect('/clientes');
    }

    public function edit($id)
    {
        $cliente =  Cliente::find($id);
        return view('clientes.edit',['cliente'=>$cliente]);

    }

    public function show($id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.show', ['cliente' => $cliente]);
    }

    public function getById($id)
    {
        $cliente = Cliente::where('id',$id)
            ->with('contatos', 'equipamentos', 'atendimentos')
            ->get();
         return view('clientes.show')->with('cliente', $cliente);

    }

     public function update(Request $request, $id)
    {
        $request = $request->all();
        $clienteUpdate = Cliente::find($id);
        $clienteUpdate->update($request);
        return redirect('/clientes');
    }

    public function destroy($id)
    {
        $clienteDelete = Cliente::find($id);
        $clienteDelete->delete();
        return $$clienteDelete;
    }
}
