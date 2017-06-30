<div class="box box-primary">

    <div class="box-header">
        <h3 class="box-title">Usuarios Encontrados</h3>
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
                <th>Acción</th>
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
                <td><?= $persona->gender;  ?></td>
                <td><?= $persona->mail;  ?></td>
                <td><?= $persona->phone;  ?></td>


                <td>

                    <button class="btn btn-primary btn-xs" onclick="mostrarficha(<?= $persona->id; ?>);" ><i class="fa fa-fw fa-eye"></i>Editar</button>
                    <button class="btn btn-danger btn-xs" onclick="eliminarficha(<?= $persona->id; ?>);" ><i class="fa fa-fw fa-eye"></i>Eliminar</button>

                </td>
            </tr>

            <?php
            }}
            ?>




        </table>


        <div class="box-footer " style="text-align: center">
            <button  onclick="guargarDatos()" class="btn btn-primary">Guardar Datos</button>
        </div>
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

