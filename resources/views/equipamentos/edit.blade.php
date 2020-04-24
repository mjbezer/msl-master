
<meta name="csrf-token" content="{{ csrf_token() }}">

          <div class="modal-body form-equipamento">
                    <form class="form-horizontal" name="form-equipamento"
                        autocomplete="off">
                        @csrf
                        <div class="form-group row ml-2">
                        <input type="hidden" name="id" value="{{$equipamento->id}}">

                        </div>
                        <div class="form-group row">
                            <div class="row col-lg-8">

                            </div>
                            <div class="col-lg-6 mt-2">
                                <label class="form-control-label">Tipo:</label>
                                 <select name="tipo" id="tipo" class="form-control">
                                 <option value="{{$equipamento->tipo}}" selected>{{$equipamento->tipo}}</option>
                                    <option value="Ar-condicionado portátil">Ar-condicionado portátil</option>
                                    <option value="Ar-condicionado de janela">Ar-condicionado de janela</option>
                                    <option value="Ar-condicionado Split tradicional">Ar-condicionado Split tradicional</option>
                                    <option value="Ar-condicionado Split Cassete">Ar-condicionado Split Cassete</option>
                                    <option value="Sistemas VRF">Sistemas VRF</option>
                                    <option value="Ar-condicionado Split Inverter">Ar-condicionado Split Inverter</option>

                                </select>

                            </div>

                            <div class="col-lg-6 mt-2">
                                <label class="form-control-label">Local de Instalação:</label>
                            <input type="text" class="form-control" name="localizacao" value="{{$equipamento->localizacao}}" />
                            </div>

                            <div class="col-lg-3 mt-2">
                                <label class="form-control-label">Marca:</label>
                                <input type="text" class="form-control" name="marca"  value="{{$equipamento->marca}}"/>
                            </div>
                            <div class="col-lg-3 mt-2">
                                <label class="form-control-label">Modelo:</label>
                                <input type="text" class="form-control" name="modelo" value="{{$equipamento->modelo}}"/>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <label class="form-control-label">Capacidade:</label>
                                <select name="capacidade" class="form-control" id="capacidade" >
                                    <option value="{{$equipamento->capacidade}}" selected>{{$equipamento->capacidade}}</option>
                                    <option value="7.000 BTUS">7.000 BTUS</option>
                                    <option value="9.000 BTUS">9.000 BTUS</option>
                                    <option value="12.000 BTUS">12.000 BTUS</option>
                                    <option value="15.000 BTUS">15.000 BTUS</option>
                                    <option value="18.000 BTUS">18.000 BTUS</option>
                                    <option value="21.000 BTUS">21.000 BTUS</option>
                                    <option value="24.000 BTUS">24.000 BTUS</option>
                                    <option value="27.000 BTUS">27.000 BTUS</option>
                                    <option value="30.000 BTUS">30.000 BTUS</option>
                                    <option value="36.000 BTUS">36.000 BTUS</option>
                                    <option value="42.000 BTUS">42.000 BTUS</option>
                                </select>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <label class="form-control-label">Nº Série:</label>
                                <input type="text" class="form-control" name="serie" value="{{$equipamento->serie}}"/>

                            </div>

                            <div class="col-lg-12 mt-2">
                                <label class="form-control-label">Observações:</label>
                            <textarea class="form-control" name="observacao" >{{$equipamento->observacao}}</textarea>

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <a href="#" class="btn btn-alt-danger btn150 close-modal"
                                    ><i class="fa fa-times"></i>
                                    Cancelar</a>
                                <a href="#" class="btn btn-alt-success update-equipamento" value="Gravar">
                                    <span><i class="fa fa-check"></i> Gravar</span>
                                </a>

                            </div>
                        </div>
                    </form>

                </div>
                <script src="{{ asset ('src/equipamentos/components.js')}}"></script>
                <script type="text/javascript" src="{{ asset('js/jquery.mask.js') }}"></script>
