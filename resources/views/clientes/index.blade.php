@extends('layouts.codebase.index-page')

@section('title') - Clientes e Fornecedores
@endsection

@section('css_after')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/css/datatable/datatable.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/css/sweetalert2/sweetalert2.min.css') }}" />

@endsection

@section('content')
<div class="content">

    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Clientes e Fornecedores</h3>
        </div>
        <div class="block-content pb-4">
            <a class="btn btn-alt-success mb-4" href="/cliente/create">
                <i class="fa fa-plus"></i> Novo Registro
            </a>

            <table id="focus" class="display table-sm responsive table-hover table-striped nowrap simple-datatable" width="100%">
                <thead class="bg-earth-lighter">
                    <tr>
                        <td class="font-w600 text-center">Nome</td>
                        <td class="font-w600 text-center">Celular</td>
                        <td class="font-w600 text-center">Telefone</td>
                        <td class="font-w600 text-center">Email</td>
                        <td class="text-center no-sort" style="width: 10px"><i class="si si-settings"></i></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->nome}}</td>
                        <td class="text-center">{{ $cliente->celular }}</td>
                        <td class="text-center">{{ $cliente->telefone }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td class="text-center">
                            <a class="btn btn-circle btn-alt-success" data-toggle="tooltip" href="/cliente/{{$cliente->id}}/edit"
                                title="Edita/Altera este registro...">
                                <i class="si si-note"></i>
                            </a>
                             <a class="btn btn-circle btn-secondary" href="/cliente/{{ $cliente->id}}/show" data-toggle="tooltip"
                                title="Visualizar ficha do cliente ...">
                                <i class="si si-folder"></i>
                            </a>
                            <a class="btn btn-circle btn-alt-danger" data-toggle="tooltip"
                                href="javascript:deleteCliente({{ $cliente->id }})"
                                title="Deleta/Exclui este registro...">
                                <i class="fa fa-times"></i>
                            </a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection

@section('js_after')
<script src="{{ asset('puglins/js/sweetalert2/js/sweetalert2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/js/datatable/datatable.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/js/datatable/simple-datatable.js') }}"></script>
<script src="{{ asset('src/mensagens-deletes/msgAndDelete.js') }}"></script>
@endsection
