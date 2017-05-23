@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Categoria</div>
                    <div class="panel-body">
                        <a href="{{ url('/category/category/create') }}" class="btn btn-success btn-sm" title="Add New category">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Nueva Categoria
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/category/category', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                        <th>ID</th><th>Año</th><th>Estado</th><th>Rama</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($category as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->year }}</td><td>{{ $item->enable }}</td><td>{{ $item->branch }}</td>
                                        <td>
                                            <a href="{{ url('/category/category/' . $item->id) }}" title="View category"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/category/category/' . $item->id . '/edit') }}" title="Edit category"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/category/category', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete category',
                                                        'onclick'=>'return confirm("¿Seguro que desea eliminar esta categoria?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $category->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
