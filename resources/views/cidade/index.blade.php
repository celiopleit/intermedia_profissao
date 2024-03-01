@extends('layout.layout')

@section('conteudo_principal')

<div class="card-body">
    <div class="card" style="box-shadow: 10px 10px 20px rgba(212, 108, 108, 0.3); transform: perspective(1000px) rotateX(10deg); transition: transform 0.3s;">
        <div class="row row text-center"  style="margin-top: 1rem; display: flex; justify-content: center;">
            <h2 style="transform: rotateX(-1deg);">Cadastro de Fluencia</h2>
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
           <a class="btn btn-success btn-sm " href="{{ route('cidade.create') }}">Novo</a>
        </div>

        <div class="card" style="box-shadow: 1px 1px 10px rgba(212, 108, 108, 0.3);">


    <table class="table table-bordered  ">

        <tr>
            <th class="text-center">Id</th>
            <th class="text-center">Municipio</th>
            <th class="text-center">Cod. Municipio</th>
            <th class="text-center">Codigo Regional</th>
            <th class="text-center">Estado</th>
            <th width="20" c class="text-center">Ação</th>
        </tr>


            @foreach ($vcidade as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ \Str::limit($value->municipio) }}</td>
                    <td>{{ \Str::limit($value->codmunic) }}</td>
                    <td>{{ \Str::limit($value->codregional) }}</td>
                    <td>{{ \Str::limit($value->uf) }}</td>

                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <form action="{{ route('cidade.destroy', $value->id) }}" method="POST">
                            <a class="btn btn-primary btn-sm " href="{{ route('cidade.edit',$value->id) }}">Editar</a>
                            @csrf

                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Deletes'>Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach

            @if (count($vcidade) == 0)
            <a class="btn btn-danger" >Não há registros</a>
            @else
            @endif



    </table>
</div>

</div>


@endsection
