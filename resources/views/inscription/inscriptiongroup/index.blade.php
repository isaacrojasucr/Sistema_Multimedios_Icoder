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
                        <a href="{{ url('/createinscription')}}" class="btn btn-success btn-sm" title="Add New inscription">
                            <i class="fa fa-plus" aria-hidden="true"></i> Inscribir nuevo equipo
                        </a>


                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th>Número </th>
                                    <th>Edición</th>
                                    <th>Categoria</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($inscriptiongrupal as $item)

                                    <tr>
                                        <th>{{$item->id}}</th>
                                        <th>{{$item->edition}}</th>
                                        <th>{{$item->category}}</th>
                                        <th>
                                            @if($item->stade == 0)
                                                <a >En Proceso</a>
                                                @elseif($item->stade == 1)
                                                <a >Completa</a>
                                                @elseif($item->stade == 2)
                                                <a >Finalizada</a>
                                            @endif

                                        </th>
                                        <th>
                                            @if($item->stade == 1)
                                                <a href="{{ url('inscriptiongroup/inscribir/'.$item->id)}}"   class="btn btn-xs btn-success">Inscribir</a>

                                                @else
                                                <a href="#" disabled="true"  class="btn btn-xs btn-default">Inscribir</a>
                                            @endif
                                                @if($item->stade == 1 or$item->stade == 0)
                                                    <a href="{{ url('inscriptiongroup/deletegroup/'.$item->id)}}" class="btn btn-xs btn-danger">Cancelar Proceso</a>

                                                @else
                                                    <a href="{{ url('inscriptiongroup/deletegroup/'.$item->id)}}" disabled="true" class="btn btn-xs btn-danger">Cancelar Proceso</a>
                                                @endif

                                            <a href="{{ route('inscriptiongroup.show', $item->id)}}" class="btn btn-xs btn-info">Editar</a>
                                        </th>
                                    </tr>

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
