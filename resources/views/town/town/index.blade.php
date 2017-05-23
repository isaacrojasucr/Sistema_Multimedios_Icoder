@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Cantón</div>
                    <div class="panel-body">
                        <a href="{{ url('/town/town/create') }}" class="btn btn-success btn-sm" title="Add New town">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Nuevo Cantón
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/town/town', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                        <th>ID</th><th>Nombre</th><th>Estado</th><th>ID de Cantón</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($town as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->enable }}</td><td>{{ $item->state_id }}</td>
                                        <td>
                                            <a href="{{ url('/town/town/' . $item->id) }}" title="View town"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/town/town/' . $item->id . '/edit') }}" title="Edit town"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/town/town', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete town',
                                                        'onclick'=>'return confirm("¿Seguro que desea eliminar este cantón?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $town->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
