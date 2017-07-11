@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')
            @if(Session::has('message'))
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{Session::get('message')}}
                </div>


            @endif
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Inscripciónes realizadas</div>
                    <div class="panel-body">
                        <a href="{{ url('/home') }}" class="btn btn-success btn-sm" title="Add New inscription">
                            <i class="fa fa-plus" aria-hidden="true"></i> Inscribir nuevo participante
                        </a>


                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th>Cedula</th>
                                    <th>Nombre</th>
                                    <th>Rama</th>
                                    <th>Categoria</th>
                                    <th>Deporte</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($people as $item)
                                    @if($item->estado == 1 or $item->estado == 2) 

                                        <tr>
                                        <th>{{$item->cedula}}</th>
                                        <th>{{$item->nombre}}</th>
                                        <th>{{$item->rama}}</th>
                                        <th>{{$item->categoria}}</th>
                                        <th>{{$item->deporte}}</th>
                                        @if($item->estado == 1)
                                        <th>
                                            @if($item->ins == 1)
                                                <a href="{{url('/inscription/inscribir/'.$item->id)}}" class="btn btn-xs btn-success">Inscribir</a>
                                            @endif
                                            <a href="{{url('/inscription/cancelarProceso/'.$item->id)}}" class="btn btn-xs btn-danger">Cancelar Proceso</a>
                                            <a href="{{url('/inscription/inscription/'.$item->id.'/edit')}}" class="btn btn-xs btn-info">Editar</a>
                                        </th>
                                        @else
                                            <th>
                                                Proceso de inscripción terminado.
                                            </th>
                                        @endif
                                        
                                        
                                    </tr>

                                    
                                    @endif

                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
