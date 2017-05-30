
function mostrarficha() {

    //funcion para mostrar y etditar la informacion del usuario
  $("#capa_modal").show();
    $("#capa_para_edicion").show();
    var url = "getImport/";

    $.get(url,function(resul){
        $("#capa_para_edicion").html(resul);
    })

}

function mostrarficha(id_usuario) {
    //funcion para mostrar y etditar la informacion del usuario
    $("#capa_modal").show();
    $("#capa_para_edicion").show();
    var url = "editar_usuario/"+id_usuario+"";
    $("#capa_para_edicion").html($("#cargador_empresa").html());
    $.get(url,function(resul){
        $("#capa_para_edicion").html(resul);
    })

}
function postImport() {



    $("#capa_modal").show();
    $("#capa_para_edicion").show();
    var url = "postImport/";
    $.get(url,function(resul){
        $("#capa_para_edicion").html(resul);
    })

}