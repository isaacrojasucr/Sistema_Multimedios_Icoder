<div class="box box-primary">

    <div class="box-header">
        <h3 class="box-title">Usuarios Encontrados</h3>
    </div>

    <div class="box-body">
        <?php


        if( count($personas) >0  ){
        ?>

        <table id="tabla_usuarios" class="table-responsive" cellspacing="0" width="100%">

            <thead>
            <tr>

                <th>Nombres</th>
                <th>MN</th>
                <th>Apellido</th>
                <th>Genero</th>
                <th>Id Card</th>
                <th>Email</th>
                <th> teléfono</th>


                <th>Acción</th>
            </tr>
            </thead>



            <tbody>


            <?php

            foreach($personas as $persona){
                if ( is_object ($persona )){
            ?>

            <tr role="row" class="odd">

                <td><?= $persona->name;  ?></td>
                <td><?= $persona->middlename;  ?></td>
                <td><?= $persona->lastname;  ?></td>
                <td><?= $persona->gender;  ?></td>
                <td><?= $persona->id_card;  ?></td>
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

