
function cargarformulario(arg){


    if(arg==1){ var url = "getImport"; }
    if(arg==2){ var url = "getImport/";
    }


    $.get(url,function(resul){
        $("#contenido_principal").html(resul);
    })


}


function cargarlistado(){



    var url = "listado";



    $.get(url,function(resul){

        $("#contenido_principal").html(resul);
    })



}



function mostrarficha(id_usuario) {

    $("#capa_modal").show();
    $("#capa_para_edicion").show();
    var url = "inscriptionfile/"+id_usuario+"/edit";

    $.get(url,function(resul){
        $("#capa_para_edicion").html(resul);
    })

}



function eliminarficha(id_usuario) {


    var url = "inscriptionfile/"+id_usuario+"/delete";

    $.get(url,function(resul){

        $("#contenido_principal").html(resul);
    })


}
function guargarDatos() {


    var url = "guardar";

    $.get(url,function(resul){

        $("#contenido_principal").html(resul);
    })


}




