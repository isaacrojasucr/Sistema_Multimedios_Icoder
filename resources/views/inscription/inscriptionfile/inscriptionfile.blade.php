@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

                <div class="panel-heading">Inscription</div>
            <div class="col-md-10">
                <ul class="nav nav-pills">
                    <li id="carga" role="presentation"class="active"><a href="javascript:void(0);" onclick="cargarformulario(2);" ><i class="fa fa-circle-o"></i>Cargar Archivo</a></li>
                    <li id="listado" role="presentation" ><a href="javascript:void(0);" onclick="cargarlistado();" ><i class="fa fa-circle-o"></i>Listado Usuarios</a></li>

                    <li class="active"></li>

                </ul>
                <?php
                ?>
            </div>
        </div>
    </div>

@endsection
