

<div class="col-md-12">


    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Cargar Datos desde Archivo</h3>
        </div><!-- /.box-header -->

        <div id="notificacion_resul_fcdu"></div>

        <form action="postImport" method="post" enctype="multipart/form-data" >

            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <div class="box-body">



                <div class="form-group col-xs-12"  >
                    <label>Agregar Archivo de Excel </label>
                    <input type="file" name="file" required>
                </div>


                <div class="box-footer">
                    <button  type="submit" class="btn btn-primary">Cargar Datos</button>
                </div>




            </div>

        </form>

    </div>

</div>
