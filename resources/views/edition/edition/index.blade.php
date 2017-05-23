@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Ediciones</div>
                    <div class="panel-body">
                        <a href="{{ url('/edition/edition/create') }}" class="btn btn-success btn-sm" title="Add New edition">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Nueva Edición
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/edition/edition', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                        <th>ID</th><th>Nombre</th><th>Estado</th><th>Año</th><th>Fecha Inicial</th><th>Fecha Final</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($edition as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        @if($item->enable == 1)
                                            <td>Activo</td>
                                        @else
                                            <td>Inactivo</td>
                                        @endif
                                        <td>{{ $item->year }}</td>
                                        <td>{{$item->initial_date}}</td>
                                        <td>{{$item->final_date}}</td>
                                        <td>
                                            <a href="{{ url('/edition/edition/' . $item->id) }}" title="View edition"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/edition/edition/' . $item->id . '/edit') }}" title="Edit edition"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/edition/edition', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete edition',
                                                        'onclick'=>'return confirm("¿Seguro que desea eliminar esta edición?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $edition->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
