@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Inscripción</div>
                    <div class="panel-body">
                        <a href="{{ url('/inscription/inscription/create') }}" class="btn btn-success btn-sm" title="Add New inscription">
                            <i class="fa fa-plus" aria-hidden="true"></i> Inscribir nuevo participante
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/inscription/inscription', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                        <th>ID</th><th>Deporte</th><th>Categoria</th><th>Prueba</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($inscription as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->sport }}</td><td>{{ $item->category }}</td><td>{{ $item->proof }}</td>
                                        <td>
                                            <a href="{{ url('/inscription/inscription/' . $item->id) }}" title="View inscription"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/inscription/inscription/' . $item->id . '/edit') }}" title="Edit inscription"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/inscription/inscription', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete inscription',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $inscription->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
