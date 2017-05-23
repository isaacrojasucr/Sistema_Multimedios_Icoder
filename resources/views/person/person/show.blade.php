@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Persona #{{ $person->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/person/person') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <a href="{{ url('/person/person/' . $person->id . '/edit') }}" title="Edit person"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['person/person', $person->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete person',
                                    'onclick'=>'return confirm("¿Seguro que desea eliminar esta persona?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $person->id }}</td>
                                    </tr>
                                    <tr><th> Nombre </th><td> {{ $person->name }} </td></tr><tr><th> Primer Apellido </th><td> {{ $person->middlename }} </td></tr><tr><th> Segundo Apellido </th><td> {{ $person->lastname }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
