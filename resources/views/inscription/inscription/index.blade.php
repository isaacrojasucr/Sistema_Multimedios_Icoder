@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-12">
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
                                        <th>Cedula</th>
                                        <th>Nombre</th>
                                        <th>Rama</th>
                                        <th>Prueba</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $people->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
