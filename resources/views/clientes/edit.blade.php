@extends('layouts.codebase.index-page')

@section('title') - Clientes e Fornecedores
@endsection

@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Clientes( Editar )</h3>
            @if($errors)
            @foreach($errors->all() as $error)
                {{$error}}
            @endforeach
            @endif
        </div>
        <div class="block-content pb-4">

        <form method="POST" action="/cliente/{{$cliente->id}}/update" class="form-horizontal validation" autocomplete="off">
                @method('PUT')
                @csrf
                <div class="form-group row ml-2">

                </div>
                <div class="form-group row">

                    <div class="col-lg-9 mt-2">
                        <label class="form-control-label">Nome:</label>
                        <input type="text" class="form-control" name="nome_razao_social"
                            required autofocus="autofocus" value="{{ $cliente->nome }}" />
                    </div>

                    <div class="col-lg-2 mt-2">
                    </div>

                    <div class="col-lg-3 mt-2">
                        <label class="form-control-label">CPF:</label>
                        <input type="text" class="form-control" name="cpf_cnpj" required data-mask="000.000.000-00"
                            value="{{ $cliente->cpf_cnpj }}" />
                    </div>

                    <div class="col-lg-3 mt-2">
                        <label class="form-control-label">RG:</label>
                        <input type="text" class="form-control" name="rg_ie" data-mask="00.000.000-0"
                            value="{{ $cliente->rg_ie }}" />
                    </div>

                    <div class="col-lg-3 mt-2">
                        <label class="form-control-label">Telefone Fixo:</label>
                        <input type="text" class="form-control" name="telefone" data-mask="(00) 0000-0000"
                            value="{{ $cliente->telefone }}" />
                    </div>

                    <div class="col-lg-3 mt-2">
                        <label class="form-control-label">Celular:</label>
                        <input type="text" class="form-control" name="celular" data-mask="(00) 00000-0000"
                            value="{{ $cliente->celular }}" />
                    </div>

                    <div class="col-lg-9 mt-2">
                        <label class="form-control-label">Email:</label>
                        <input type="text" class="form-control" name="email" value="{{ $cliente->email }}" />
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-lg-2 mt-2">
                        <label class="form-control-label">CEP:</label>
                        <input type="text" class="form-control" name="cep" id="cep" onblur="pesquisacep(this.value)"
                            value="{{ $cliente->cep }}" data-mask="00000-000" />
                    </div>

                    <div class="col-lg-8 mt-2">
                        <label class="form-control-label">Logradouro:</label>
                        <input type="text" class="form-control" name="logradouro" id="Logradouro"
                            value="{{ $cliente->logradouro }}" />
                    </div>

                    <div class="col-lg-2 mt-2">
                        <label class="form-control-label">Número:</label>
                        <input type="text" class="form-control" name="numero" value="{{ $cliente->numero }}" />
                    </div>
                    <div class="col-lg-3 mt-2">
                        <label class="form-control-label">Complemento:</label>
                        <input type="text" class="form-control" name="complemento"
                            value="{{ $cliente->complemento }}" />
                    </div>


                    <div class="col-lg-4 mt-2">
                        <label class="form-control-label">Bairro:</label>
                        <input type="text" class="form-control" name="bairro" id="bairro"
                            value="{{ $cliente->bairro }}" />
                    </div>

                    <div class="col-lg-4 mt-2">
                        <label class="form-control-label">Cidade:</label>
                        <input type="text" class="form-control" name="cidade" value="{{ $cliente->cidade }}" id="cidade">
                    </div>

                    <div class="col-lg-1 mt-2">
                        <label class="form-control-label">UF:</label>
                        <input type="text" class="form-control" name="UF" id="uf" value="{{ $cliente->uf }}" />
                    </div>
                    <input type="hidden" id="ibge" name="CodigoMunicipio" value="{{ $cliente->codigo_municipio }}" />
                </div>
                <hr />

                <div class="form-group row">
                    <div class="col">
                        <button onclick="goBack()" class="btn btn-alt-warning"><i class="fa fa-chevron-left"></i> Voltar</button>
                            <button type="submit" class="btn btn-alt-success" value="Gravar">
                            <span><i class="fa fa-check"></i> Gravar</span>
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>
    @endsection


    @push('importJs')
    <!--form validation Custom js-->
    <script src="{{ asset ('plugin/validate-jQuery/jquery.validate.js') }}"></script>
    <script src="{{ asset ('plugin/validate-jQuery/additional-methods.min.js') }}"></script>
    <script src="{{ asset ('src/clientes/validate-form.js') }}"></script>
    <script src="{{ asset('plugins/js/sweetalert2/js/sweetalert2.min.js') }}"></script>
    @endpush

    @section('js_after')
    <script type="text/javascript" src="{{ asset('js/jquery.mask.js') }}"></script>

    <script>
        function pesquisacep(valor) {

            var cep = valor.replace(/\D/g, '');
            //Verifica se campo cep possui valor informado.
            if (cep != "") {
                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;
                //Valida o formato do CEP.
                if (validacep.test(cep)) {
                    //Preenche os campos com "..." enquanto consulta webservice.
                    $('input[name="logradouro"]').val('...');
                    $('input[name="bairro"]').val('...');
                    $('input[name="cidade"]').val('...');
                    $('input[name="uf"]').val('...');
                    $('input[name="codigo_municipio"]').val('...');
                    //Cria um elemento javascript.
                    var script = document.createElement('script');
                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';
                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'CEP inválido, tente outro codigo postal!',
                        confirmButtonColor: '#b4c253',

                    })
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };

        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            $('input[name="logradouro"]').val('');
            $('input[name="bairro"]').val('');
            $('input[name="cidade"]').val('');
            $('input[name="uf"]').val('');
            $('input[name="codigo_municipio"]').val('');
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                $('input[name="logradouro"]').val(conteudo.logradouro);
                $('input[name="bairro"]').val(conteudo.bairro);
                $('input[name="cidade"]').val(conteudo.localidade);
                $('input[name="uf"]').val(conteudo.uf);
                $('input[name="codigo_municipio"]').val(conteudo.ibge);
                console.log(conteudo)
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'CEP inválido, tente outro codigo postal!',
                    confirmButtonColor: '#b4c253',
                })
            }
        }

    </script>

    <script>
        $('input[name="cpf_cnpj"]').keydown(function () {
            try {
                $('input[name="cpf_cnpj"]').unmask();
            } catch (e) {}

            var tamanho = $('input[name="cpf_cnpj"]').val().length;

            if (tamanho < 12) {
                $('input[name="cpf_cnpj"]').mask("999.999.999-99");
            } else {
                $('input[name="cpf_cnpj"]').mask("99.999.999/9999-99");
            }

            // ajustando foco
            var elem = this;
            setTimeout(function () {
                // mudo a posição do seletor
                elem.selectionStart = elem.selectionEnd = 10000;
            }, 0);
            // reaplico o valor para mudar o foco
            var currentValue = $(this).val();
            $(this).val('');
            $(this).val(currentValue);
        });

    </script>
    <script>
        function goBack() {
              window.history.back();
        }
    </script>
    @endsection
