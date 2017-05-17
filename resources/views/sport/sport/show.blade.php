@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Deporte #{{ $sport->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/sport/sport') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <a href="{{ url('/sport/sport/' . $sport->id . '/edit') }}" title="Edit sport"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['sport/sport', $sport->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete sport',
                                    'onclick'=>'return confirm("¿Seguro que desea eliminar este deporte?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $sport->id }}</td>
                                    </tr>
                                    <tr><th> Nombre </th><td> {{ $sport->name }} </td></tr><tr><th> Estado </th><td> {{ $sport->enable }} </td></tr><tr><th> Tipo </th><td> {{ $sport->type }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
