@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Prueba</div>
                    <div class="panel-body">
                        <a href="{{ url('/challenge/challenge/create') }}" class="btn btn-success btn-sm" title="Agregar Nueva Prueba">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Nueva Prueba
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/challenge/challenge', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Buscar...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Nombre</th><th>ID de la Categoria</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($challenge as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->cat_id }}</td>
                                        <td>
                                            <a href="{{ url('/challenge/challenge/' . $item->id) }}" title="View challenge"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/challenge/challenge/' . $item->id . '/edit') }}" title="Edit challenge"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/challenge/challenge', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete challenge',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $challenge->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
