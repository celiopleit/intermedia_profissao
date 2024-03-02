@extends('layout.layout')

@section('conteudo_principal')

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Opaa!</strong> Algo na Gravação aconteceu.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


            <div class="row d-flex justify-content-center" style="margin-top: 80px;">

              <div class="col-md-6">

                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Alterar Cidade</h3>
                  </div>

                  <!-- Inicio do formulario -->
                    <div class="card-footer d-flex justify-content-center">
                        <a class="btn btn-primary" href="{{ route('cidade.index') }}">Voltar</a>
                    </div>
                    <form action="{{ route('cidade.update',$vcidade->codmunic) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="card-body" >
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Codigo Municipio:</strong>
                                        <input type="text" name="codmunic" value="{{$vcidade->codmunic}}" class="form-control" placeholder="Codigo Municipio">
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Codigo Regional:</strong>
                                        <input type="text" name="codregional" value="{{$vcidade->codregional}}" class="form-control" placeholder="Código Regional">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Município:</strong>
                                        <input type="text"  name="municipio" value="{{$vcidade->municipio}}" class="form-control" placeholder="Município">
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <strong>Estado:</strong>

                                        <select class="form-select" name="uf" id="uf">
                                            <option value="" disabled selected> Selecione... </option>
                                            @foreach ($vuf as $muf)
                                                <option value="{{$muf->uf }}"    {{($muf->uf  == $vcidade->uf)   ? 'selected' :''}} > {{ $muf->estado }}</option>
                                            @endforeach





                                        </select>

                                    </div>
                                </div>

                            </div>
                        </div>
                            <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Gravar</button>
                            </div>
                    </form>
                </div>

          </div>





    @endsection
