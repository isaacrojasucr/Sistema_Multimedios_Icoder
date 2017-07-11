@extends('layouts.app')

@section('title','Editar Usuariog')

@section('content')
    <div class="container">
        @if(count($errors) >0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach

                </ul>

            </div>


        @endif

            @if(Session::has('message'))
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{Session::get('message')}}
                </div>


            @endif
        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">

                    <div class="box-header">
                        <h3 class="panel-heading"> Nuevo participante - Inscripción #:  {{$inscription->id}} </h3>
                    </div><!-- /.box-header -->

                    <div id="notificacion_resul_feu"></div>


                    {!! Form::open(['route' => 'inscriptiongroup.store', 'method' => 'post', 'files'=>true]) !!}
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="id_usuario"  value="<?= $usuario->id; ?>">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="box-body ">

                                    <div class="form-group col-xs-12">
                                        <label for="cedulal">Cedula*</label>
                                        <input type="search" class="form-control" id="cedula" name="cedula" required value=""  >
                                        <a onclick="" id="buscarcedula" name="buscarcedula" class="btn btn-xs btn-primary">Buscar</a>
                                    </div>

                                    <div class="form-group col-xs-12">
                                        <label for="nombre">Nombres*</label>
                                        <input type="text" class="form-control" id="nombre" name="nombres" required value="<?= $usuario->name; ?>"  >
                                    </div>

                                    <div class="form-group col-xs-12">
                                        <label for="apellido">Apellido</label>
                                        <input type="text" class="form-control" id="apellido" name="apellido" required  value="<?= $usuario->lastname; ?>" >
                                    </div>


                                    <div class="form-group col-xs-12">
                                        <label for="ocupacion">Genero</label>
                                        <select class="form-control" name="genero" id="genero">
                                            <option value="1" >Masculino</option>
                                            <option value="2" >Femenino</option>
                                        </select>
                                    </div>



                                </div>
                            </div>




                            <div class="col-md-4">
                                <div class="box-body ">

                                    <div class="form-group col-xs-12">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" required  value="<?= $usuario->mail; ?>" >
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <label for="ocupacion">Teléfono</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono" required value="<?= $usuario->phone; ?>" >
                                    </div>



                                    <div class="form-group col-xs-12">
                                        <label for="nombre">País</label>
                                        <input type="text" class="form-control" id="pais" name="pais"  value="<?= $usuario->country; ?>"  >
                                    </div>



                                    <div class="form-group {{ $errors->has('birthday') ? 'has-error' : ''}}">
                                        {!! Form::label('birthday', 'Fecha de Nacimiento', ['class' => 'col-md-12 control-label']) !!}
                                        <div class="col-md-12">
                                            {!! Form::date('birthday', null, ['class' => 'form-control']) !!}
                                            {!! $errors->first('birthday', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="box-body ">

                                    <div class="form-group col-xs-12">
                                        <label for="apellido">Altura</label>
                                        <input type="text" class="form-control" id="altura" name="altura" required value="<?= $usuario->height; ?>" >
                                    </div>

                                    <div class="form-group col-xs-12">
                                        <label for="ciudad">Peso</label>
                                        <input type="text" class="form-control" id="peso" name="peso" required value="<?= $usuario->width; ?>"  >
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <label for="ocupacion">Tipo de sangre</label>
                                        {!! Form::select('blood',['1'=>'A+', '2'=>'A-', '3'=>'B+', '4'=>'B-', '5'=>'AB+', '6'=>'AB-', '7'=>'O+','8'=>'O-'] , null, ['class'=>'form-control']) !!}
                                    </div>




                                </div>
                            </div>



                        </div>


                        <div class="row">
                            <div class="col-md-8" >
                                <h3>Archivos</h3>
                                <div class="box-body " >

                                    <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
                                        {!! Form::label('image', 'Foto', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::file('image', ['class' => 'form-control border-input']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('id_card_front') ? 'has-error' : ''}}">
                                        {!! Form::label('id_card_front', 'Frente de Cédula', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::file('id_card_front', ['class' => 'form-control']) !!}
                                            {!! $errors->first('id_card_front', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('id_card_back') ? 'has-error' : ''}}">
                                        {!! Form::label('id_card_back', 'Reverso de Cédula', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::file('id_card_back',['class' => 'form-control']) !!}
                                            {!! $errors->first('id_card_back', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('id_pase_cantonal') ? 'has-error' : ''}}" >
                                        {!! Form::label('id_pase_cantonal', 'Pase cantonal', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::file('id_pase_cantonal',['class' => 'form-control']) !!}
                                            {!! $errors->first('id_pase_cantonal', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    <div class="box-body ">
                    <div class="form-group"  style="text-align: center; margin-top: 30px">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-success ' ] ) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
                </div>

            </div>




        </div>
    </div>

@endsection
