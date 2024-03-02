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
                    <h3 class="card-title">Cadastro de Habilidades com Idioma</h3>
                  </div>

                  <!-- Inicio do formulario -->
                    <div class="card-footer d-flex justify-content-center">
                        <a class="btn btn-primary" href="{{ route('comofala.index') }}">Voltar</a>
                    </div>
                    <form action="{{ route('comofala.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputDescricao">Descrição</label>
                                <input type="text" name="descricao" class="form-control" placeholder="Descrição" value="{{ old('descricao') }}">
                                @error('descricao')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                            <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Gravar</button>
                            </div>
                    </form>
                </div>

          </div>

    @endsection
