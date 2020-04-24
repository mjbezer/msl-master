<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContaReceber;

class ContaPagarController extends Controller
{
    public function index()
    {
        $data_inicio = \Request::get('data_inicio')  ;
        $data_fim =  \Request::get('data_fim')  ;
     
        if( $data_inicio ){

            list( $diaIni, $mesIni, $anoIni ) = explode('/', $data_inicio) ;
            list( $diaFim, $mesFim, $anoFim ) = explode('/', $data_fim ) ;
    
            $data_inicio = $anoIni.'-'.$mesIni.'-'.$diaIni  ;
            $data_fim = $anoFim.'-'.$mesFim.'-'.$diaFim  ;
                $contasPagar = ContaPagar::whereBetween('data_vencimento',[$data_inicio, $data_fim])
                                            ->get();   
                         
        }else{
                $contasPagar = ContasPagar::whereMonth('data_vencimento',date('m'))
                                             ->get();

        }
        return view('contas-pagar.index', [
                            'contasPagar' => $contasPagar
                            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contas-pagar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request     request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $request->all();
        $request['valor_original']=str_replace(',','.',str_replace('.','',$request['valor_original']));
        $request['valor_pago']=str_replace(',','.',str_replace('.','',$request['valor_pago']));
        $insertContasPagar = ContaPagar::create($request);
        return redirect('/contas-pagar');
   }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contaPagar = ContasPagar::find($id);

        return view('contas-pagar.edit', ['contaPagar'=> $contaPagar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request  edit
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request = $request->all();
        $request['valor_original']=str_replace(',','.',str_replace('.','',$request['valor_original']));
        $request['valor_pago']=str_replace(',','.',str_replace('.','',$request['valor_pago']));
        $updateContaPagar = ContasPagar::find($id);
        $updateContaPagar->update($request);
        return redirect('/contas-pagar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $deleteContaPagar = ContaPagar::find($id);
           if($deleteContaPagar->data_pagamento){
            $json['message'] = 'Despesa consolidada não pode ser excluida!';
            return response()->json($json);
        } else {
            $deleteContaPagar->delete();
            return $deleteContaPagar;
        }
    }

}