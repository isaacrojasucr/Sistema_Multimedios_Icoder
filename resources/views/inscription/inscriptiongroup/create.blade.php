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


        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">

                    <div class="box-header">
                        <h3 class="panel-heading"> Nuevo participante - Inscripción #:  {{$inscription->id}} </h3>
                    </div><!-- /.box-header -->

                    <div id="notificacion_resul_feu"></div>


                    <form  id="f_editar_usuario"  method="post"  action="store"  enctype="multipart/form-data" class="form-horizontal form_entrada" >
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="id_usuario" value="<?= $usuario->id; ?>">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="box-body ">

                                    <div class="form-group col-xs-12">
                                        <label for="cedulal">Cedula*</label>
                                        <input type="search" class="form-control" id="cedula" name="cedula"  value=""  >
                                    </div>

                                    <div class="form-group col-xs-12">
                                        <label for="nombre">Nombres*</label>
                                        <input type="text" class="form-control" id="nombre" name="nombres"  value="<?= $usuario->name; ?>"  >
                                    </div>

                                    <div class="form-group col-xs-12">
                                        <label for="apellido">Apellido</label>
                                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $usuario->lastname; ?>" >
                                    </div>


                                    <div class="form-group col-xs-12">
                                        <label for="institucion">Genero</label>
                                        <input type="text" class="form-control" id="genero" name="genero"  value="<?= $usuario->gender; ?>" >
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <label for="email">Email*</label>
                                        <input type="text" class="form-control" id="email" name="email"   value="<?= $usuario->mail; ?>" >
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <label for="ocupacion">Teléfono</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $usuario->phone; ?>" >
                                    </div>




                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="box-body ">

                                    <div class="form-group col-xs-12">
                                        <label for="apellido">Altura</label>
                                        <input type="text" class="form-control" id="altura" name="altura" value="<?= $usuario->height; ?>" >
                                    </div>

                                    <div class="form-group col-xs-12">
                                        <label for="ciudad">Peso</label>
                                        <input type="text" class="form-control" id="peso" name="peso" value="<?= $usuario->width; ?>"  >
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <label for="ocupacion">Tipo de sangre</label>
                                        {!! Form::select('blood',['1'=>'A+', '2'=>'A-', '3'=>'B+', '4'=>'B-', '5'=>'AB+', '6'=>'AB-', '7'=>'O+','8'=>'O-'] , null, ['class'=>'form-control']) !!}
                                    </div>




                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="box-body ">
                                    <div class="form-group col-xs-12">
                                        <label for="nombre">País*</label>
                                        <input type="text" class="form-control" id="pais" name="pais"  value="<?= $usuario->country; ?>"  >
                                    </div>

                                    <div class="form-group col-xs-12">
                                        <label for="institucion">Fecha de nacimiento</label>
                                        <input type="text" class="form-control" id="fechanacimiento" name="fechanacimiento"  value="<?= $usuario->birthday; ?>" >
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <label for="ocupacion">Canton</label>
                                        <input type="text" class="form-control" id="Canton" name="Canton" value="<?= $usuario->town; ?>" >
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <label for="email">Provincia*</label>
                                        <input type="text" class="form-control" id="provincia" name="provincia"   value="<?= $usuario->province; ?>" >
                                    </div>



                                </div>
                            </div>





                        </div>


                        <div class="row">
                            <div class="col-md-8">
                                <h3>Archivos</h3>
                                <div class="box-body ">

                                    <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
                                        {!! Form::label('Foto', 'Foto', ['class' => 'col-md-4 control-label']) !!}
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
                                    <div class="form-group {{ $errors->has('id_pase_cantonal') ? 'has-error' : ''}}">
                                        {!! Form::label('id_pase_cantonal', 'Pase cantonal', ['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::file('id_pase_cantonal',['class' => 'form-control']) !!}
                                            {!! $errors->first('id_pase_cantonal', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="box-footer " style="text-align: center">
                            <button type="submit" class="btn btn-primary">Actualizar Datos</button>
                        </div>
                    </form>
                </div>

            </div>




        </div>
    </div>

@endsection
