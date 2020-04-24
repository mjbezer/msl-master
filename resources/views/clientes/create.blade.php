@extends('layouts.codebase.index-page')

@section('title') - Clientes
@endsection
@section('css_after')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/css/sweetalert2/css/sweetalert2.min.css') }}" />
@endsection

@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Clientes e Fornecedores ( Novo )</h3>
            @if($errors)
            @foreach($errors->all() as $error)
                <span class="btn btn-alt-danger"><i class="fa fa-exclamation-triangle"></i>
                    {{$error}}
                </span>
            @endforeach
        @endif
        </div>
        <div class="block-content pb-6 ">

            <form method="POST" action="/cliente/store" class="form-horizontal " id="form-clientes" autocomplete="off">
                {{ csrf_field() }}
                  </div>
                <div class="form-group row pl-4 pr-4">
                    <div class="row col-lg-8">

                    </div>
                    <div class="col-lg-9 mt-2">
                        <label class="form-control-label">Nome / Razão Social:</label>
                        <input type="text" class="form-control" name="nome"
                            autofocus="autofocus"  required />
                    </div>

                    <div class="col-lg-2 mt-2">
                    </div>

                    <div class="col-lg-3 mt-2">
                        <label class="form-control-label">CPF / CNPJ:</label>
                        <input type="text" class="form-control" name="cpf_cnpj"  value="{{old ('cpf_cnpj')}}" required />
                    </div>

                    <div class="col-lg-3 mt-2">
                        <label class="form-control-label">RG / Incrição Estadual:</label>
                        <input type="text" class="form-control" name="rg_ie" value="{{old ('rg_ie')}}"/>
                    </div>

                    <div class="col-lg-3 mt-2">
                        <label class="form-control-label">Telefone Fixo:</label>
                        <input type="text" class="form-control" name="telefone"  value="{{old ('telefone')}}" data-mask="(00) 0000-0000" />
                    </div>

                    <div class="col-lg-3 mt-2">
                        <label class="form-control-label">Celular:</label>
                        <input type="text" class="form-control" name="celular" value="{{old ('celular')}}" data-mask="(00) 00000-0000" />
                    </div>

                    <div class="col-lg-9 mt-2">
                        <label class="form-control-label">Email:</label>
                        <input type="text" class="form-control" name="email" value="{{old ('email')}}" required />
                    </div>
                </div>
                <hr>
                <div class="form-group row pl-4 pr-4">
                    <div class="col-lg-2 mt-2">
                        <label class="form-control-label">CEP:</label>
                        <input type="text" class="form-control" name="cep" id="cep" value="{{old ('cep')}}" onblur="pesquisacep(this.value)"
                            data-mask="00000-000" />
                    </div>

                    <div class="col-lg-8 mt-2">
                        <label class="form-control-label">Logradouro:</label>
                        <input type="text" class="form-control" name="logradouro" value="{{old ('logradouro')}}" id="Logradouro" />
                    </div>

                    <div class="col-lg-2 mt-2">
                        <label class="form-control-label">Número:</label>
                        <input type="text" class="form-control" name="numero" value="{{old ('numero')}}"/>
                    </div>
                    <div class="col-lg-3 mt-2">
                        <label class="form-control-label">Complemento:</label>
                        <input type="text" class="form-control text-uppercase" name="complemento" value="{{old ('complemento')}}" />
                    </div>


                    <div class="col-lg-4 mt-2">
                        <label class="form-control-label">Bairro:</label>
                        <input type="text" class="form-control" name="bairro" id="bairro" value="{{old ('bairro')}}"/>
                    </div>

                    <div class="col-lg-4 mt-2">
                        <label class="form-control-label">Cidade:</label>
                        <input type="text" class="form-control" name="cidade" id="cidade" value="{{old ('cidade')}}">
                    </div>

                    <div class="col-lg-1 mt-2">
                        <label class="form-control-label">UF:</label>
                        <input type="text" class="form-control" name="uf" id="uf" value="{{old ('uf')}}" />
                    </div>
                    <input type="hidden" id="ibge" name="codigo_municipio"  value="{{old ('codigo_municipio')}}"/>
                </div>
                <hr />

                <div class="form-group row pl-4 pb-4">
                    <div class="col">
                        <button type="button" class="btn btn-alt-warning btn150" onclick="location.href='/pessoas'"><i
                                class="fa fa-chevron-left"></i>
                            Voltar</button>
                        <button type="reset" class="btn btn-alt-info"><i class="fa fa-broom"></i>
                            Limpar</button>
                        <button type="submit" class="btn btn-alt-success" value="Gravar">
                            <span><i class="fa fa-check"></i> Gravar</span>
                        </button>

                    </div>
                </div>
            </form>

        </div>


    </div>
    @endsection




    @section('js_after')
    <!--form validation Custom js-->
    <script src="{{ asset ('plugin/validate-jQuery/jquery.validate.js') }}"></script>
    <script src="{{ asset ('plugin/validate-jQuery/additional-methods.min.js') }}"></script>
    <script src="{{ asset ('src/pessoas/validate-form.js') }}"></script>
    <script src="{{ asset('plugins/js/sweetalert2/js/sweetalert2.min.js') }}"></script>

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
    @endsection
