
<meta name="csrf-token" content="{{ csrf_token() }}">

          <div class="modal-body form-usuario-adicional">
                    <form class="form-horizontal" name="form-contato"
                        autocomplete="off">
                        @csrf
                        <div class="form-group row ml-2">
                        <input type="hidden" name="cliente_id" value="{{$cliente_id}}">

                        </div>
                        <div class="form-group row">
                            <div class="row col-lg-8">

                            </div>
                            <div class="col-lg-8 mt-2">
                                <label class="form-control-label">Nome:</label>
                                <input type="text" class="form-control" name="nome" autofocus="autofocus" required />
                            </div>

                                <div class="col-lg-4 mt-2">
                                <label class="form-control-label">Cargo:</label>
                                <input type="text" class="form-control" name="cargo" autofocus="autofocus" />
                            </div>

                            <div class="col-lg-3 mt-2">
                                <label class="form-control-label">Celular:</label>
                                <input type="text" class="form-control" name="celular" data-mask="(00) 00000-0000" />
                            </div>
                            <div class="col-lg-3 mt-2">
                                <label class="form-control-label">Telefone:</label>
                                <input type="text" class="form-control" name="telefone" data-mask="(00) 00000-0000" />
                            </div>


                            <div class="col-lg-9 mt-2">
                                <label class="form-control-label">Email:</label>
                                <input type="text" class="form-control" name="email" required />
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <a href="#" class="btn btn-alt-warning btn150"
                                    onclick="location.href='/pessoas/'"><i class="fa fa-chevron-left"></i>
                                    Voltar</a>
                                <a type="reset" class="btn btn-alt-info"><i class="fa fa-broom"></i>
                                    Limpar</a>
                                <a href="#" class="btn btn-alt-success novo-contato" value="Gravar"  id="novo-contato">
                                    <span><i class="fa fa-check"></i> Gravar</span>
                                </a>

                            </div>
                        </div>
                    </form>

                </div>
                <script src="{{ asset ('src/contatos/components.js')}}"></script>
                <script type="text/javascript" src="{{ asset('js/jquery.mask.js') }}"></script>
