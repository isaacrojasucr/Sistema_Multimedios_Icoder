

<div class="row">

    <div class="col-md-12">

        <div class="box box-primary">

            <div class="box-header">
                <h3 class="box-title">Editar información</h3>
            </div><!-- /.box-header -->

            <div id="notificacion_resul_feu"></div>



            <form  id="f_editar_usuario"  method="post"  action="editar" class="form-horizontal form_entrada" >
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="id_usuario" value="<?= $usuario->id; ?>">

                <div class="row">
                    <div class="col-md-6">
                <div class="box-body ">
                    <div class="form-group col-xs-12">
                        <label for="nombre">Nombres*</label>
                        <input type="text" class="form-control" id="nombre" name="nombres"  value="<?= $usuario->name; ?>"  >
                    </div>

                    <div class="form-group col-xs-12">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $usuario->lastname; ?>" >
                    </div>


                    <div class="form-group col-xs-12">
                        <label for="institucion">Genero</label>
                        <input type="text" class="form-control" id="genero" name="genero"  value="<?= $usuario->gender; ?>" >
                    </div>
                    <div class="form-group col-xs-12">
                        <label for="email">Email*</label>
                        <input type="text" class="form-control" id="email" name="email"   value="<?= $usuario->mail; ?>" >
                    </div>
                    <div class="form-group col-xs-12">
                        <label for="ocupacion">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $usuario->phone; ?>" >
                    </div>




                </div>
                    </div>

                    <div class="col-md-6">
                        <div class="box-body ">
                            <div class="form-group col-xs-12">
                                <label for="nombre">País*</label>
                                <input type="text" class="form-control" id="pais" name="pais"  value="<?= $usuario->country; ?>"  >
                            </div>
                            <div class="form-group col-xs-12">
                                <label for="apellido">Altura</label>
                                <input type="text" class="form-control" id="altura" name="altura" value="<?= $usuario->height; ?>" >
                            </div>



                            <div class="form-group col-xs-12">
                                <label for="ciudad">Peso</label>
                                <input type="text" class="form-control" id="peso" name="peso" value="<?= $usuario->width; ?>"  >
                            </div>
                            <div class="form-group col-xs-12">
                                <label for="institucion">Fecha de nacimiento</label>
                                <input type="text" class="form-control" id="fechanacimiento" name="fechanacimiento"  value="<?= $usuario->birthday; ?>" >
                            </div>
                            <div class="form-group col-xs-12">
                                <label for="ocupacion">Canton</label>
                                <input type="text" class="form-control" id="Canton" name="Canton" value="<?= $usuario->town; ?>" >
                            </div>
                            <div class="form-group col-xs-12">
                                <label for="email">Provincia*</label>
                                <input type="text" class="form-control" id="provincia" name="provincia"   value="<?= $usuario->province; ?>" >
                            </div>



                        </div>
                    </div>

                </div>

                <div class="box-footer " style="text-align: center">
                    <button type="submit" class="btn btn-primary">Actualizar Datos</button>
                </div>
            </form>
        </div>

    </div>




</div>

