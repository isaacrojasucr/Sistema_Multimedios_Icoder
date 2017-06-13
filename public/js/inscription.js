
function cargarformulario(arg){
//funcion que carga todos los formularios del sistema

    if(arg==1){ var url = "getImport"; }
    if(arg==2){ var url = "getImport/";
    }


    $.get(url,function(resul){
        $("#contenido_principal").html(resul);
    })


}


function cargarlistado(){

    //funcion para cargar los diferentes  en general

    var url = "listado";



    $.get(url,function(resul){

        $("#contenido_principal").html(resul);
    })



}







function mostrarficha(id_usuario) {

    $("#capa_modal").show();

    var url = "/inscriptionfile/" + id_usuario;

    $.get(url,function(resul){
        $("#capa_para_edicion").html(resul);
    })

}

