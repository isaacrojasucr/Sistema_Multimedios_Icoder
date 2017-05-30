@extends('layouts.app')

@section('content')



    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">Inscription</div>
                    {!! Form::open(['url' => 'inscription/form'],['class' => 'col-md-10 control-label']) !!}
                    <form class="form-horizontal" submit.delegate="save()">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#archivo2" aria-controls="archivo2" role="tab" data-toggle="tab">Cargar Archivo</a>
                            </li>
                            <li role="presentation">
                                <a href="#Listado" aria-controls="Listado" role="tab" data-toggle="tab">Listado</a>
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
                            <div role="tabpanel" class="tab-pane active" id="archivo2">
                                <div class="form-group">
                                    <div class="col-xs-9">



                                        <li class="active"><a href="{{URL::to('getImport')}}"  ><i class="fa fa-circle-o"></i>Import </a></li>



                                    </div>

                                </div>
                                <!--- ...  -->
                            </div>
                            <div role="tabpanel" class="tab-pane" id="Listado">
                                <div class="form-group">

                                    <div class="col-xs-12">




                                        {!! Form::open(['url' => '/inscriptionfile', 'class' => 'form-horizontal', 'files' => true]) !!}

                                        @include ('inscription.inscription.formlist')

                                        {!! Form::close() !!}

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

                    <section>
                        <div id="capa_modal" class="div_modal" ></div>
                        <div id="capa_para_edicion" class="div_contenido" > </div>
                    </section>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
