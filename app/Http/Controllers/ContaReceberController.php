<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContaReceber;

class ContaReceberController extends Controller
{
    public function index()
    {
        $data_inicio = \Request::get('data_inicio');
        $data_fim = \Request::get('data_fim');

        if( $data_inicio ){
            
            list( $diaIni, $mesIni, $anoIni ) = explode('/', $data_inicio) ;
            list( $diaFim, $mesFim, $anoFim ) = explode('/', $data_fim ) ;
            $data_inicio = $anoIni.'-'.$mesIni.'-'.$diaIni  ;
            $data_fim = $anoFim.'-'.$mesFim.'-'.$diaFim  ;
            $contasReceber = ContaReceber::whereBetween('data_vencimento',[$data_inicio, $data_fim])
                                          ->with(['pedido.pessoa', 'pessoa','categoria','subcategoria'])
                                          ->get();

          }else{
                $contasReceber = ContaReceber::whereMonth('data_vencimento',date('m'))
              ->with(['atendimento.cliente', 'cliente'])
              ->get();
            }

          return view('contas-receber.index', [
                              'contasReceber' => $contasReceber
                              ]);
    }

    public function create()
    {
        return view('contas-receber.create');
    }

     public function store(Request $request)
    {
        $request = $request->all();
        $contaReceber = ContaReceber::create($request);
        return redirect('/contas-receber');
    }

    static function storeBySchedulle($atendimento_id):void
    {
        $insertContaReceber = new ContaReceber;
        $insertContaReceber->atendimento_id = $atendimento_id;
    }

     public function edit($id)
    {
        $contaReceber = ContaReceber::find($id);
        if(isset($contaReceber->atendimento_id)){
            $contaReceber = ContaReceber::where('id',$id)
                                    ->with(['atendimento.cliente',
                                            'cliente'
                                            ])
                                    ->get();
        return view('contas-receber.edit', ['contaReceber'=>$contaReceber, 'contasExtas' => false]);
        } else {
            $contaReceber = ContaReceber::where('id',$id)
                ->with(['cliente'])
                ->first();
                    return view('contas-receber.edit', ['contaReceber'=>$contaReceber , 'contasExtas' => true]) ;
        }
    }

    public function update(Request $request, $id)
    {
        $contaReceber = ContaReceber::find($id);
        $request = $request->all();
        $contaReceber->update($request);
        return view ('/contas-receber');
    }

    static function updateBySchedulle($atendimento_id, $request):void
    {
        $updateContaReceber = ContaReceber::where('atendimento_id',$atendimento_id)->first();
        $updateContaReceber->forma_recebimento = $request['forma_recebimento']; 
        $updateContaReceber->data_vencimento = $request['data_vencimento'];
        $updateContaReceber->data_pagamento = $request['data_pagamento'];
        $updateContaReceber->valor = $request['valor'];
        $updateContaReceber->update();
   
    }

    public function destroy($id)
    {
        $deleteContaReceber = ContaReceber::find($id);
        $deleteContaReceber->delete();
        return $deleteContaReceber;

    }

    static function destroyBySchedule($atendimento_id):void
    {
        $deleteContaReceber = ContaReceber::where('atendimento_id',$atendimento_id)->first();
        $deleteContaReceber->delete();
      
        
    }
  
}