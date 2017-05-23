@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading"> Nueva inscripción / Deporte: {{$name}}</div>
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

                        {!! Form::open(['route' => 'inscription/save', 'method' => 'post']) !!}
                        <ul class="nav nav-tabs" id="tabs" data-tabs="tabs" style="text-align: center">
                            <li class="active"><a href="#personal" data-toggle="tab">Datos Personales</a></li>
                            <li><a href="#atlete" data-toggle="tab">Información de atleta</a></li>
                            <li><a href="#settings" data-toggle="tab">Pruebas</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="personal">
                                <br/>
                                <div class="form-horizontal">
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                        {!! Form::label('name', 'Nombre', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('middlename') ? 'has-error' : ''}}">
                                        {!! Form::label('middlename', 'Primer Apellido', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::text('middlename', null, ['class' => 'form-control']) !!}
                                            {!! $errors->first('middlename', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('lastname') ? 'has-error' : ''}}">
                                        {!! Form::label('lastname', 'Segundo Apellido', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
                                            {!! $errors->first('lastname', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('id_card') ? 'has-error' : ''}}">
                                        {!! Form::label('id_card', 'Cédula', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::number('id_card', null, ['class' => 'form-control']) !!}
                                            {!! $errors->first('id_card', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('country') ? 'has-error' : ''}}">
                                        {!! Form::label('country', 'País', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::text('country', null, ['class' => 'form-control']) !!}
                                            {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('birthday') ? 'has-error' : ''}}">
                                        {!! Form::label('birthday', 'Fecha de Nacimiento', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::date('birthday', null, ['class' => 'form-control']) !!}
                                            {!! $errors->first('birthday', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                                        {!! Form::label('address', 'Otras Señas', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::text('address', null, ['class' => 'form-control']) !!}
                                            {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="atlete">
                                <br/>
                                <div class="form-horizontal">
                                    <div class="form-group {{ $errors->has('height') ? 'has-error' : ''}}">
                                        {!! Form::label('height', 'Altura', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::number('height', null, ['class' => 'form-control']) !!}
                                            {!! $errors->first('height', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('width') ? 'has-error' : ''}}">
                                        {!! Form::label('width', 'Peso', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::number('width', null, ['class' => 'form-control']) !!}
                                            {!! $errors->first('width', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('blood') ? 'has-error' : ''}}">
                                        {!! Form::label('blood', 'Tipo de Sangre', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::select('blood',['1'=>'A+', '2'=>'A-', '3'=>'B+', '4'=>'B-', '5'=>'AB+', '6'=>'AB-', '7'=>'O+','8'=>'O-'] , null, ['class'=>'form-control']) !!}
                                            {!! $errors->first('blood', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('mail') ? 'has-error' : ''}}">
                                        {!! Form::label('mail', 'Correo', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::text('mail', null, ['class' => 'form-control']) !!}
                                            {!! $errors->first('mail', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                                        {!! Form::label('phone', 'Telefono', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                                            {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
                                        {!! Form::label('image', 'Foto', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::file('image', null, ['class' => 'form-control']) !!}
                                            {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('id_card_front') ? 'has-error' : ''}}">
                                        {!! Form::label('id_card_front', 'Frente de Cédula', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::file('id_card_front', null, ['class' => 'form-control']) !!}
                                            {!! $errors->first('id_card_front', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('id_card_back') ? 'has-error' : ''}}">
                                        {!! Form::label('id_card_back', 'Reverso de Cédula', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::file('id_card_back', null, ['class' => 'form-control']) !!}
                                            {!! $errors->first('id_card_back', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="settings">
                                <br/>

                                <div class="form-horizontal">
                                    <div class="form-group">
                                        {{ Form::hidden('sport', $id , array('id' => 'sport')) }}
                                    </div>

                                    <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
                                        {!! Form::label('branch', 'Rama', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::select('gender', ['1'=>'Masculino','2'=>'Femenino'], null,['class' => 'form-control']) !!}
                                            {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
                                        {!! Form::label('category', 'Categoria', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::select('category', $category, null,['class' => 'form-control']) !!}
                                            {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('proof') ? 'has-error' : ''}}">
                                        {!! Form::label('proof', 'Pruebas', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {{ Form::hidden('1', $var = 1 , array('id' => '1')) }}
                                            @foreach($challenges as $challenge)
                                                {!! Form::select('proof'.$var, $challenge, null,['class' => 'form-control']) !!}
                                                {{ Form::hidden('1', $var = $var+1 , array('id' => '1')) }}
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('pase_cantonal') ? 'has-error' : ''}}">
                                        {!! Form::label('pase_cantonal', 'Pase Cantonal', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::file('pase_cantonal', null, ['class' => 'form-control']) !!}
                                            {!! $errors->first('pase_cantonal', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div>
                                        @foreach($edition as $ed)
                                            @if($ed->enable == 1)
                                                {{ Form::hidden('edition', $ed->id , array('id' => 'edition')) }}
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                        {{--@include ('inscription.inscription.form')--}}

                        <div class="form-group" style="text-align: center">
                            {!! Form::submit('Guardar', ['class' => 'btn btn-success ' ] ) !!}
                        </div>

                        {!! Form::close() !!}

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