@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Inscription</div>
                {!! Form::open(['url' => 'inscription/form'],['class' => 'col-md-4 control-label']) !!}
                <form class="form-horizontal" submit.delegate="save()">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#personal" aria-controls="personal" role="tab" data-toggle="tab">Datos Personales</a>
                        </li>
                        <li role="presentation">
                            <a href="#direccion" aria-controls="direccion" role="tab" data-toggle="tab">Direccion</a>
                        </li>
                        <li role="presentation">
                            <a href="#deporte" aria-controls="deporte" role="tab" data-toggle="tab">Deporte</a>
                        </li>
                        <li role="presentation">
                            <a href="#documento" aria-controls="documento" role="tab" data-toggle="tab">Documentos</a>
                        </li>
                        <li role="presentation">
                            <a href="#documento" aria-controls="documento" role="tab" data-toggle="tab">Submit</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="personal">
                            <div class="form-group">
                                <div class="col-xs-9">

                                    {!! Form::open(['url' => '/inscription/inscription', 'class' => 'form-horizontal', 'files' => true]) !!}

                                    @include ('inscription.inscription.form')

                                    {!! Form::close() !!}

                                </div>
                            </div>
                            <!--- ...  -->
                        </div>
                        <div role="tabpanel" class="tab-pane" id="direccion">
                            <div class="form-group">
                                <label for="Direccion" class="control-label col-xs-3">Dirección></label>
                                <div class="col-xs-9">
                                    <input maxlength="200" type="text" class="form-control" value.bind="currentItem.Direccion" name="Direccion">
                                </div>
                            </div>
                            <!--- ...  -->
                        </div>
                        <div role="tabpanel" class="tab-pane" id="deporte">
                            <div class="form-group">
                                <label for="deporte" class="control-label col-xs-3">deporte</label>
                                <div class="col-xs-9">
                                    <input required maxlength="10" type="text" class="form-control" value.bind="currentItem.deporte" name="deporte">
                                </div>
                            </div>
                            <!--- ...  -->
                        </div>
                        <div role="tabpanel" class="tab-pane" id="documento">
                            <div class="form-group">
                                <label for="documento" class="control-label col-xs-3">documento</label>
                                <div class="col-xs-9">
                                    <input required maxlength="10" type="text" class="form-control" value.bind="currentItem.documento" name="documento">
                                </div>
                            </div>
                            <!--- ...  -->
                        </div>
                        <div role="tabpanel" class="tab-pane" id="submit">
                            <div class="form-group">
                                <label for="submit" class="control-label col-xs-3">Submit</label>
                                <div class="col-xs-9">
                                    <input required maxlength="10" type="text" class="form-control" value.bind="currentItem.submit" name="submit">
                                </div>
                            </div>
                            <!--- ...  -->
                        </div>
                    </div>
                </form>
                {!! Form::close() !!}


            </div>
        </div>
    </div>
</div>

@endsection
