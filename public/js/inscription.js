
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

function mostrarfichagrupal(id_usuario) {

    $("#capa_modal").show();
    $("#capa_para_edicion").show();
    var url = "inscriptiongroup/"+id_usuario+"/edit";

    $.get(url,function(resul){
        $("#capa_para_edicion").html(resul);
    })

}

function mostrarCargarArchivo() {

    $("#capa_modal").show();
    $("#capa_para_edicion").show();
    var url = "getImport";

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
function eliminarfichagrupo(id_usuario) {


    var url = "inscriptiongroup/"+id_usuario+"/deletegroup";

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

$('#sport').on('change',function (e) {
    console.log(e) ;
    var _token = $('input[name="_token"]').val();
    var id_sport = e.target.value;
    // var newid = $(this).attr('id')
    $.ajax({
        method: "POST",
        url: "/ajaxloadsport/setid/"+id_sport,
        data: { _token : _token }
    })
        .done(function( msg ) {
            //Done
        });

    //$.get('/ajax-loadsport?id_sport='+id_sport,function (data) {

    // })
})

$('#sportg').on('change',function (e) {
    console.log(e) ;
    var _token = $('input[name="_token"]').val();
    var id_sport = e.target.value;
    // var newid = $(this).attr('id')
    $.ajax({
        method: "POST",
        url: "/ajaxloadsportgrup/setid/"+id_sport,
        data: { _token : _token }
    })
        .done(function( msg ) {
            //Done
        });

    //$.get('/ajax-loadsport?id_sport='+id_sport,function (data) {

    // })
})



$('#buscarcedula').on('click',function (e) {

    $("#mjcreate").hide();
    console.log(e) ;
    var cedula = $('#cedula').val();

    // var newid = $(this).attr('id')
    $.get('/buscarcedula/cedula/'+cedula,function (data) {
        console.log(JSON.parse(data)) ;
       $.each(JSON.parse(data),function (index, persona) {
           if ( persona.name=="") {
               $("#mjcreate").show();
               $("#resultado").html("El atleta ya se encuentra en otra inscripción");
           } else {

           $('#nombre').val(persona.name);
           $('#apellido').val(persona.lastname);
           $('#genero').val(persona.gender).selected;

       }
    });


    });
});



