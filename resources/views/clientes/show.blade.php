@extends('layouts.codebase.index-page')

@section('title') - {{ $cliente->nome_usual_fantasia }}
@endsection

@section('css_after')
<link rel="stylesheet" type="text/css" href="{{asset('plugins/css/datatable/datatable.css') }}" />
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-4">
            <div class="block">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                        <input type="hidden" name="cliente_id" value="{{$cliente->id}}">
                            <span class="h5">{{ $cliente->nome }}</span>
                        </h3>
                        <a href="/clientes.index" class="btn-block-option"><i
                                class="si si-arrow-left"></i></a>
                    </div>
                    <div class="block-content">
                        <div class="font-size-lg text-black mb-5">{{ $cliente->nome }}</div>
                        <address>
                            <a class="text-muted" target="_blank"
                                href="https://www.google.com/maps/place/{{ $cliente->logradouro.", ".$cliente->numero." - ".$cliente->bairro }}">

                                <i class="fa fa-map-marker"></i>
                                {{ $cliente->logradouro.", ".$cliente->numero." ".$cliente->complemento }}
                                <br>
                                {{ $cliente->cep." - ".$cliente->cidade." / ".$cliente->uf  }}<br>

                            </a>

                            <i class="fa fa-phone mr-5"></i> {{ $cliente->telefone }}<br>
                            <i class="fa fa-whatsapp mr-5"></i> <a class="text-muted"
                                href="https://api.whatsapp.com/send?phone=55{{ preg_replace("/[^0-9]/", "", $cliente->celular) }}"
                                target="_blank">

                                {{ $cliente->celular }}
                            </a><br>

                            <i class="fa fa-envelope-o mr-5"></i> <a href="mailto:{{ $cliente->email }}"
                                target="_blank">{{ $cliente->email }}</a>

                        </address>
                        <hr>
                        <div class="row mb-20">
                            <div class="col">
                                {{-- BOTÕES --}}
                                <a href="/cliente/{{$cliente->id}}/edit "
                                    class="col-md-6 col-sm-6 btn btn-alt-warning mt-1">
                                    <i class="si si-note"></i> Editar Dados Cliente
                                </a>
                                {{-- <a href="" class="col-md-4 col-sm-6 btn btn-alt-info mt-1">
                                    <i class="si si-bubble"></i> Enviar SMS
                                </a> --}}
                                <button  value="contato" class="col-md-6 col-sm-6 btn btn-alt-success mt-1 open-modal">
                                    <i class="fa fa-address-card"></i> Incluir Novo Contato
                                </button>
                                <button value="equipamento"
                                    class="col-md-6 col-sm-6 btn btn-alt-info mt-1 open-modal">
                                <i class="fa fa-snowflake-o "></i> Incluir Novo Equipamento
                            </button>

                                <button value="atendimento"
                                    class="col-md-6 col-sm-6 btn btn-alt-secundary mt-1 open-modal">
                                    <i class="si si-calendar"></i> Agendar Novo Atendimento
                        </button>

                            </div>


                        </div>

                    </div>

                </div>



            </div>
        </div>



        <div class="col-lg-8">
            <div class="block">
                <ul class="nav nav-tabs nav-tabs-block align-items-center" data-toggle="tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#contatos">Contatos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#equipamentos">Equipamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#faturamento">Faturamento</a>
                    </li>
                    <li class="nav-item ml-auto">
                        <div class="block-options mr-15">
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="fullscreen_toggle"></button>
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="content_toggle"></button>

                        </div>
                    </li>
                </ul>
                <div class="block-content tab-content">
                    <div class="tab-pane active" id="contatos" role="tabpanel">
                        <table id="focus" class="display table-sm responsive table-hover table-striped w-100 my-4 simple-datatable" width="100%">
                            <thead class="bg-info-light text-primary">
                                <tr>
                                    <td class="text-center font-w600">Nome</td>
                                    <td class="text-center font-w600">Celular</td>
                                    <td class="text-center font-w600">E-mail</td>
                                    <td class="text-center font-w600">Cargo</td>
                                    <td class="text-center" style="min-width: 20px">
                                        <i class="si si-settings"></i>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($cliente->contatos as $contato)

                            <td>{{$contato->nome}}</td>
                            <td>{{$contato->celular}}</td>
                            <td>{{$contato->email}}</td>
                            <td>{{$contato->cargo}}</td>
                            <td><a class="text-success edit-modal" onclick="javascript:editModal('contato',{{$contato->id}})" data-toggle="tooltip"
                                title="Edita/Altera este registro...">
                                <i class="si si-note"></i>
                                </a>
                                <a class="text-danger" data-toggle="tooltip"
                                title="Exclui este registro...">
                                <i class="fa fa-times"></i>
                                </a>
                            </td>

                        </tbody>
                            @endforeach
                        </table>

                    </div>
                    <div class="tab-pane" id="equipamentos" role="tabpanel">
                        <table class="display responsive table-sm table-hover table-striped w-100 my-4 simple-datatable" width="100%">
                            <thead class="bg-info-light text-primary">
                                <tr>
                                    <td class="text-center font-w600">Tipo</td>
                                    <td class="text-center font-w600">Marca/Modelo</td>
                                    <td class="text-center font-w600">Capacidade</td>
                                    <td class="text-center font-w600">Localização</td>
                                    <td class="text-center no-sort" style="min-width: 40px"><i class="si si-settings"></i>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cliente->equipamentos as $equipamento)
                                <td>{{$equipamento->tipo }}</td>
                                <td>{{$equipamento->marca}}/{{$equipamento->modelo}}</td>
                                <td>{{$equipamento->capacidade}}</td>
                                <td>{{$equipamento->localizacao}}</td>
                                <td><a class="text-success edit-modal" data-toggle="tooltip" onclick="javascript:editModal('equipamento',{{$equipamento->id}})"
                                    title="Edita/Altera este registro...">
                                    <i class="si si-note"></i>
                                    </a>
                                    <a class="text-danger "  data-toggle="tooltip"
                                    title="Exclui este registro...">
                                    <i class="fa fa-times"></i>
                                    </a></td>
                                    @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="faturamento" role="tabpanel">
                        <table class="display table-sm responsive table-hover table-striped w-100 my-4 simple-datatable" width="100%">

                            <thead class="bg-info-light text-primary">
                                <tr>
                                    <td class="text-center font-w600">#</td>
                                    <td class="text-center font-w600">Serviço</td>
                                    <td class="text-center font-w600" style="min-width:120px">Realizado</td>
                                    <td class="text-center font-w600">Equipamento</td>
                                    <td class="text-center font-w600" style="min-width:120px">Vencimento</td>
                                    <td class="text-center font-w600">Valor</td>
                                    <td class="text-center font-w600">Status</td>
                                    <td class="text-center no-sort" style="width: 40px"><i class="si si-settings"></i>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

                <!--MODAL DINÂMICO DE INCLUSÂO DE CONTATO, EQUIPAMENTO E ATENDIMENTO -->

                <div id="modal-cliente" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-header">
                            <h3 class="text-white font-w300"></h3>
                            <a href="" class="btn-block-option text-white">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                        <div class="modal-content">

                        </div>
                    </div>
                </div>

                <!-- FIM DO MODAL DINAMICO-->

            </div>

        </div>

    </div>

</div>
@endsection

@section('js_after')
<script type="text/javascript" src="{{ asset('plugins/js/datatable/datatable.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/js/datatable/js/simple-datatable.js') }}"></script>
<script src="{{ asset ('src/modais/modaisManager.js')}}"></script>
<script src="{{ asset ('src/contatos/components.js')}}"></script>

@endsection
