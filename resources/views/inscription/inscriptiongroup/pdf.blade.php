<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

</head>
<body>
<h1>Reporte Inscripción-Equipos</h1>
<div class="container">
    <div class="row">
        @include('admin.sidebar')

        <div class="box box-primary">
            <h3 class="box-title">Inscripción: {{$inscriptiongrupal->id}}</h3>
            <div class="form-group col-xs-3">
                <div><label for="">Edición: {{$edition->year}} </label></div>
                <div><label for="">Ciudad: {{$town->name}}</label></div>
                <div class="form-group">
                    <label for="">Deporte: </label>
                    <select class="form-control input-sm" name="sportg" id="sportg">
                        @foreach($sport as $spo)
                            <option value="{{$spo->id}}" {{($spo->id == $inscriptiongrupal->sport) ? 'selected':''}}>{{$spo->name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
        </div>
    </div>



    <div class="row">
        <div class="box-header">
            <h3 class="box-title"> Lista de participantes</h3>
        </div>

        <div class="table-responsive ">
            <?php


            if( count($personas) >0  ){
            ?>

            <table id="tabla_usuarios" class="table table-borderless" >

                <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Nombres</th>
                    <th>Apellido</th>
                    <th>Género</th>
                    <th>Email</th>
                    <th>Teléfono</th>

                </tr>
                </thead>



                <tbody>


                <?php

                foreach($personas as $persona){
                if ( is_object ($persona )){
                ?>

                <tr role="row" class="odd">
                    <td><?= $persona->id_card;  ?></td>
                    <td><?= $persona->name;  ?></td>
                    <td><?= $persona->lastname;  ?></td>
                    @if($persona->gender==1or$persona->gender=="M")
                        <td><?= "   M"  ?></td>
                    @else
                        <td><?= "   F"  ?></td>
                    @endif
                    <td><?= $persona->mail;  ?></td>
                    <td><?= $persona->phone;  ?></td>




                </tr>

                <?php
                }}
                ?>




            </table>



            <?php




            }
            else
            {

            ?>


            <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningun usuario...</label>  </div>

            <?php
            }

            ?>


        </div>




    </div>
</div>

</body>
</html>
