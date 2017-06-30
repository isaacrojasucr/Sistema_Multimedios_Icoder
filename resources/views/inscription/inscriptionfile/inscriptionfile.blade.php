@extends('layouts.app')

@section('title', 'Inscripción - Cargar Archivo')

@section('content')
    <div class="container">
        <div class="row">

            <div class="panel-heading">Inscripción - Cargar Archivo</div>
            <div class="col-xs-12">
                <div class="form-group col-xs-3">
                </div>
                <div class="form-group col-xs-3">
                    <label for="selecionado">Deporte selecionado:</label>
                    <input type="text" class="form-control" id="nombre" name="nombres"  value="<?= $sport; ?>"  >
                </div>
            </div>


            <div class="col-md-10">
                <ul class="nav nav-pills">

                    <li id="carga" role="presentation"class="active"><a href="javascript:void(0);" onclick="mostrarCargarArchivo();" ><i class="fa fa-circle-o"></i>Cargar Archivo</a></li>


                    <li class="active"></li>

                </ul>
                <?php
                ?>
            </div>


        </div>

        @if(Session::has('message'))
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{Session::get('message')}}
            </div>


        @endif

        <div class="box-header">
            <h3 class="box-title">Usuarios Encontrados</h3>
        </div>

        <table class="table table-striped">
            <thead>
            <th>Cédula</th>
            <th>Nombres</th>
            <th>Apellido</th>
            <th>Género</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Acciones</th>



            </thead>

            <tbody>
            <tr>
                @if($personas!=null)
                    @foreach ($personas as $persona)
                        <td>{{$persona->id_card}}</td>
                        <td>{{$persona->name}}</td>
                        <td>{{$persona->lastname}}</td>
                        <td>{{$persona->gender}}</td>
                        <td>{{$persona->mail}}</td>
                        <td>{{$persona->phone}}</td>
                        <td><a class="btn btn-success" href="{{route('inscriptionfile.edit', $persona->id)}}" role="button"><i class="fa fa-pencil-square-o"></i>Editar</a>
                            <a class="btn btn-danger" href="{{route('inscriptionfile.destroy', $persona->id)}}" onclick="return confirm('Quiere borrar el registro?')" role="button"><i class="fa fa-trash-o"></i>Eliminar</a>
                        </td>

            </tr>

            @endforeach
            @else
                <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningun usuario...</label>  </div>

            @endif
            </tbody>
        </table>



    </div>



@endsection