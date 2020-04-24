
<meta name="csrf-token" content="{{ csrf_token() }}">

          <div class="modal-body form-contato">
                    <form class="form-horizontal" name="form-contato"
                        autocomplete="off">
                        @csrf
                        @method('PUT')

                        <div class="form-group row ml-2">
                        <input type="hidden" name="id" value="{{$contato->id}}">

                        </div>
                        <div class="form-group row">
                            <div class="row col-lg-8">

                            </div>
                            <div class="col-lg-8 mt-2">
                                <label class="form-control-label">Nome:</label>
                            <input type="text" class="form-control" name="nome" value="{{$contato->nome}}" autofocus="autofocus" required />
                            </div>

                                <div class="col-lg-4 mt-2">
                                <label class="form-control-label">Cargo:</label>
                                <input type="text" class="form-control" name="cargo" value="{{$contato->cargo}}" autofocus="autofocus" />
                            </div>

                            <div class="col-lg-3 mt-2">
                                <label class="form-control-label">Celular:</label>
                                <input type="text" class="form-control" name="celular" data-mask="(00) 00000-0000" value="{{$contato->celular}}"/>
                            </div>
                            <div class="col-lg-3 mt-2">
                                <label class="form-control-label">Telefone:</label>
                                <input type="text" class="form-control" name="telefone" data-mask="(00) 00000-0000" value="{{$contato->telefone}}"/>
                            </div>


                            <div class="col-lg-9 mt-2">
                                <label class="form-control-label">Email:</label>
                                <input type="text" class="form-control" name="email" required value="{{$contato->email}}"/>
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <a href="#" class="btn btn-alt-danger btn150 close-modal"
                                ><i class="fa fa-times"></i>
                                Cancelar</a>
                                <a href="#" class="btn btn-alt-success update-contato" value="Gravar" >
                                    <span><i class="fa fa-check"></i> Gravar</span>
                                </a>

                            </div>
                        </div>
                    </form>

                </div>
                <script src="{{ asset ('src/contatos/components.js')}}"></script>
                <script type="text/javascript" src="{{ asset('js/jquery.mask.js') }}"></script>
