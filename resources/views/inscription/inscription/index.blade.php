@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Inscripción</div>
                    <div class="panel-body">
                        <a href="{{ url('/home') }}" class="btn btn-success btn-sm" title="Add New inscription">
                            <i class="fa fa-plus" aria-hidden="true"></i> Inscribir nuevo participante
                        </a>


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
                                    <th>Categoria</th>
                                    <th>Deporte</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($people as $item)

                                    <tr>
                                        <th>{{$item->cedula}}</th>
                                        <th>{{$item->nombre}}</th>
                                        <th>{{$item->rama}}</th>
                                        <th>{{$item->prueba}}</th>
                                        <th>{{$item->categoria}}</th>
                                        <th>{{$item->deporte}}</th>
                                        <th>
                                            <a href="#" class="btn btn-xs btn-success">Inscribir</a>
                                            <a href="#" class="btn btn-xs btn-danger">Desinscribir</a>
                                            <a href="#" class="btn btn-xs btn-info">Editar</a>
                                        </th>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
