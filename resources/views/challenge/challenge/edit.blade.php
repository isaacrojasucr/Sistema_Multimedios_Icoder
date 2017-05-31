@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Prueba #{{ $challenge->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/challenge/challenge') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($challenge, [
                            'method' => 'PATCH',
                            'url' => ['/challenge/challenge', $challenge->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('challenge.challenge.form', ['submitButtonText' => 'Actualizar'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
