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

                    {{Form::open(array('url'=>'','files'=>true))}}

                   <div class="form-group">
                       <label for=""></label>
                       <select class="form-control input-sm" name="sport" id="sport">
                           @foreach($sport as $spo)
                             <option value="{{$spo->id}}">{{$spo->name}}</option>
                           @endforeach
                       </select>
                   </div>

                    {{Form::close()}}


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


        @if($personas!=null &&(count($personas)>0) )
            {!! Form::open(['route' => 'inscriptionfile.store', 'method' => 'POST']) !!}
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


            </tbody>
        </table>
            <div class="box-footer " style="text-align: center">
                {!! Form::submit('Registrar', ['class' =>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        @else
            <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningun usuario...</label>  </div>

        @endif





    </div>

    <script>
        $('#sport').on('change',function (e) {
           console.log(e) ;

           var id_sport = e.target.value;
           $.get('/ajax-loadsport?id_sport='+id_sport,function (data) {
               
           })
        })
    </script>

@endsection