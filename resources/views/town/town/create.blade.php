@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Nuevo Cantón</div>
                    <div class="panel-body">
                        <a href="{{ url('/town/town') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/town/town', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('town.town.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
