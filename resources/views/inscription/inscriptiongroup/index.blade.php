@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Inscripciónes realizadas</div>
                    <div class="panel-body">
                        <a href="{{ url('/home') }}" class="btn btn-success btn-sm" title="Add New inscription">
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
                                    <th>Ciudad</th>
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
                                        <th>{{$item->town}}</th>
                                        <th>{{$item->category}}</th>
                                        <th>
                                            @if($item->stade == 1)
                                                <a >En Proceso</a>
                                                @else
                                                <a >Finalizada</a>
                                            @endif

                                        </th>
                                        <th>
                                            @if($item->stade == 1)
                                                <a href="#" class="btn btn-xs btn-success">Inscribir</a>
                                            @endif
                                            <a href="#" class="btn btn-xs btn-danger">Cancelar Proceso</a>
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
