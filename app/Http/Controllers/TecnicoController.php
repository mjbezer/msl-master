<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tecnico;

class TecnicoController extends Controller
{
     public function index()
    {
        $tecnicos = Tecnico::all();
        return view('tecnicos.index',['tecnicos'=> $tecnicos]);
    }

    public function create()
    {
        return view('tecnicos.create');
    }

    public function store(Request $request)
    {
        $request= $request->all();
        $insertTecnico = Tecnico::create($request);
        return redirect('/tecnicos');

    }

    public function edit($id)
    {
        $tecnico =  Tecnico::find($id);
        return view('tecnicos.edit',['tecnico'=>$tecnico]);
        
    }
    
    public function getById($id)
    {
        $tecnico = Tecnico::where('id',$id)
            ->with('contatos', 'equipamentos', 'atendimentos')   
            ->get();
         return view('tecnicos.show')->with('tecnico', $tecnico);
         
    }

     public function update(Request $request, $id)
    {
        $request = $request->all();
        $tecnicoUpdate = Tecnico::find($id);
        $tecnicoUpdate->update($request);
        return view('tecnicos.index');
    }

    public function destroy($id)
    {
        $tecnicoDelete = Tecnico::find($id);
        $tecnicoDelete->delete();
        return $$tecnicoDelete;
    }
}