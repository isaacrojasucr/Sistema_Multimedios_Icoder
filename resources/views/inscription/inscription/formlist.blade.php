<div class="box box-primary">

    <div class="box-header">
        <h3 class="box-title">Usuarios Encontrados</h3>
    </div>

    <div class="box-body">
        <?php

        if( count($personas) >0){
        ?>

        <table id="tabla_usuarios" class="table-responsive" cellspacing="0" width="100%">

            <thead>
            <tr>
                <th style="width:10px">Id</th>
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
            ?>

            <tr role="row" class="odd">
                <td class="sorting_1"><?= $persona->id; ?></td>
                <td><?= $persona->name;  ?></td>
                <td><?= $persona->middlename;  ?></td>
                <td><?= $persona->lastname;  ?></td>
                <td><?= $persona->gender;  ?></td>
                <td><?= $persona->id_card;  ?></td>
                <td><?= $persona->mail;  ?></td>
                <td><?= $persona->phone;  ?></td>


                <td>
                    <a href="{{ url('/inscription/inscription/' . $persona->id) }}" title="View inscription"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                    <a href="{{ url('/inscription/inscription/' . $persona->id . '/edit') }}" title="Edit inscription"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['/inscription/inscription', $persona->id],
                        'style' => 'display:inline'
                    ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete inscription',
                            'onclick'=>'return confirm("Confirm delete?")'
                    )) !!}
                    {!! Form::close() !!}
                </td>
            </tr>

            <?php
            }
            ?>




        </table>



        <?php


        echo str_replace('/?', '?', $personas->render() )  ;

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

