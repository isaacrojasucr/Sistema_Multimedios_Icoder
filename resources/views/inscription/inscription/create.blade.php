@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-1">
                    </div>
                <div class="col-md-10">
                    <div class="panel panel-default">
                        <div class="panel-heading"> Nueva inscripción / Deporte "nombre"</div>
                        <div class="panel-body">
                            <a href="{{ url('/inscription/inscription') }}" title="Back">
                                <button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left"
                                                                          aria-hidden="true"></i> Back
                                </button>
                            </a>
                            <br/>
                            <br/>
                            <div></div>
                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif


                            <ul class="nav nav-tabs" id="tabs" data-tabs="tabs" style="text-align: center">
                                <li class="active"><a href="#personal" data-toggle="tab">Datos Personales</a></li>
                                <li><a href="#atlete" data-toggle="tab">Información de atleta</a></li>
                                <li><a href="#settings" data-toggle="tab">Pruebas</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="personal">
                                    {!! Form::open(['url' => '/person/person', 'class' => 'form-horizontal', 'files' => true]) !!}
                                    <br/>
                                    @include ('person.person.form')
                                    {!! Form::close() !!}
                                </div>

                                <div class="tab-pane" id="atlete">
                                    <br/>
                                    Tipo de sangre,etc
                                </div>

                                <div class="tab-pane" id="settings">
                                    <br/>
                                    {!! Form::open(['url' => '/inscription/inscription', 'class' => 'form-horizontal', 'files' => true]) !!}
                                        @include ('inscription.inscription.form')</div>
                                    {!! Form::close() !!}
                            </div>
                            {{--@include ('inscription.inscription.form')--}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#tabs').tab();
        });
    </script>
@endsection
