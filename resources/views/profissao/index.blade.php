@extends('layout.layout')

@section('conteudo_principal')

<div class="card-body">
    <div class="card" style="box-shadow: 10px 10px 20px rgba(212, 108, 108, 0.3); transform: perspective(1000px) rotateX(10deg); transition: transform 0.3s;">
        <div class="row row text-center"  style="margin-top: 1rem; display: flex; justify-content: center;">
            <h2 style="transform: rotateX(-1deg);">Cadastro de Profissão</h2>
        </div>
    </div>
</div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('no_delete'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
   @endif




    <div class="card-body">
        <div>
           <a class="btn btn-success btn-sm " href="{{ route('profissao.create') }}">Novo</a>
        </div>

        <div class="card" style="box-shadow: 1px 1px 10px rgba(212, 108, 108, 0.3);">


    <table class="table table-bordered  ">

        <tr>
            <th class="text-center">Id</th>
            <th class="text-center">Descrição</th>
            <th width="1000" class="text-center">Ação</th>
        </tr>


            @foreach ($profissao_all as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ \Str::limit($value->descricao) }}</td>

                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <form action="{{ route('profissao.destroy', $value->id) }}" method="POST">
                            <a class="btn btn-primary btn-sm " href="{{ route('profissao.edit',$value->id) }}">Editar</a>
                            @csrf

                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Deletes'>Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach

            @if (count($profissao_all) == 0)
            <a class="btn btn-danger" >Não há registros</a>
            @else
            @endif



    </table>
</div>

</div>


@endsection
