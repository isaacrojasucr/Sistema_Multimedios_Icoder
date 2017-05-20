@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary" style="text-align: center;">
                    <div class="panel-heading">Seleccione un deporte</div>

                    <div class="panel-body" >
                        {!! Form::label('sport', 'Deporte') !!}
                        <div class="dropdown" >
                            <button  class="btn btn-default dropdown-toggle btn" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                Seleccione el deporte <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" style="margin-left: 37.5%;  text-align: center" >
                                @foreach($info as $data)
                                    <li><a href="#{{$data->id}}">{{$data->name}}</a></li>
                                @endforeach

                            </ul>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#option1').remove();
            $('#option2').remove();
            $('#option3').remove();
            $('#option4').remove();
        });

    </script>
@endsection
