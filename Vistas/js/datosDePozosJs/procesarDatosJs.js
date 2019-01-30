$(document).ready(function(){


   $("#guardar").on('click', function(){

    var codigo = 12+Math.floor((Math.random() * (11-5))+5);
    var depto = $('#departamento').val();
    var municipio = $('#municipio').val();
    var tipo = $('#tipo').val();
    var latitud = $('#latitud').val();
    var longitud = $('#longitud').val();
    var altura = $('#altura').val();
    var nivel = $('#nivel').val();
    var profundidad = $('#profundidad').val();
    var fecha = $('#fecha').val();
    var propietario = $('#propietario').val();
    var estado = $('#estado').val();
    var geologia = $('#geologia').val();
    var observacion = $('#observacion').val();

    
        
    if(codigo == ""){
        alert("");
        return false;
    }
    if(depto == "0"){
        alert("Ingrese todos los datos");
        return false;
    }
    if(municipio == "0"){
        alert("Ingrese todos los datos");
        return false;
    }
    if(tipo == "0"){
        alert("Ingrese todos los datos");
        return false;
    }
    if(latitud == ""){
        alert("Ingrese todos los datos");
        return false;
    }
    if(longitud == ""){
        alert("Ingrese todos los datos");
        return false;
    }
    if(altura == ""){
        alert("Ingrese todos los datos");
        return false;
    }
    if(nivel == ""){
        alert("Ingrese todos los datos");
        return false;
    }
    if(profundidad == ""){
        alert("Ingrese todos los datos");
        return false;
    }
    if(fecha == ""){
        alert("Ingrese todos los datos");
        return false;
    }
    if(propietario == "0"){
        alert("Ingrese todos los datos");
        return false;
    }
   

    $.ajax({
        type: 'POST',
        url: '../Controladores/datosDePozos/almacenarDatos.php',
        data: {codigo:codigo, depto:depto, municipio:municipio, tipo:tipo, latitud:latitud,
        longitud:longitud, altura:altura, nivel:nivel, profundidad:profundidad, fecha:fecha, 
        propietario:propietario, estado:estado, geologia:geologia, observacion:observacion},
        success: function(respuesta) {
            
            if(respuesta==1){
                
                $(".tabla_ajax").load("../Vistas/tablaDatosPozos.php");
                $("#formPozos")[0].reset();
                alert("Se agrego correctamente ");
            }
            if(respuesta==2){
                alertify.error("No se pudieron agregar los datos ");
            }
            if(respuesta==3){
                alert("Las coordenadas ya existen ");
            }
        },
        error: function(){
            alert("Error en el servidor ");
        }
    });//fin de ajax


    return false;
   });//fin del click

   $("#deptoEdit").on("change", function(){

    var depto = $("#deptoEdit").val();
    //alert("llega");
    if(depto != ""){
        //alert("llega");
        $.ajax({
            type:'POST',
            url: '../Controladores/datosDePozos/extraerMunicipios.php',
            data:{depto:depto},
            success:function(data){

                if(data != 0 || data != ""){
                    $("#muniEdit").empty();
                    $("#muniEdit").append(data);
                }
                if(data == "0"){
                
                    $("#muniEdit").empty();
                    $("#muniEdit").append("<option value='0' >No hay municipios para el departamento</option>"); 
                }
                
                
            },
            error:function(data){
                alertify.error("error" +data);
                
            }
        });
    }
        

});//fin del change

   $("#iframe").contents().find("#obtener").on("click", function(){
         var latitud = $("#iframe").contents().find("#coordsLa").val();
         var longitud = $("#iframe").contents().find("#coordsLo").val();

         if(latitud != "" && longitud != ""){
            $(".modal").modal("hide");
         }
         
       
   });//letura del inframe del mapa

   

   $("#mapa").on("click", function(){

            var latitud = $("#latEdit").val();
            var longitud = $("#lonEdit").val();
            var ruta = "editMapaPozo.php?lat="+latitud+"&lon="+longitud;
            $("#iframe3").prop("src", ruta);
           
           $(".cerrar").hide();
           $("#formularioEditar").hide();
           $("#mapaEdit").show();

   });//fin del clik

   $("#okeditCoords").on("click",function(){

            $(".cerrar").show();
            $("#formularioEditar").show();
            $("#mapaEdit").hide();
   });


   
   $("#editarPozo").on('click', function(){

    var idpozo = $("#id").val();
    var codigo = $('#codigoEdit').val();
    var depto = $('#deptoEdit').val();
    var municipio = $('#muniEdit').val();
    var tipo = $('#tipoEdit').val();
    var latitud = $('#latEdit').val();
    var longitud = $('#lonEdit').val();
    var altura = $('#alturaEdit').val();
    var nivel = $('#nivelEdit').val();
    var profundidad = $('#profundidadEdit').val();
    var fecha = $('#fechaEdit').val();
    var propietario = $('#propEdit').val();
    var estado = $('#estadoEdit').val();
    var geologia = $('#geologiaEdit').val();
    var observacion = $('#observacionEdit').val();

    codigo ="ING2018"; //temporal mientras se hace el metodo de generar codigo
    
    if(idpozo == ""){
        alert("");
        return false;
    }
    if(codigo == ""){
        alert("");
        return false;
    }
    if(depto == "0"){
        alert("Ingrese todos los datos");
        return false;
    }
    if(municipio == "0"){
        alert("Ingrese todos los datos");
        return false;
    }
    if(tipo == "0"){
        alert("Ingrese todos los datos");
        return false;
    }
    if(latitud == ""){
        alert("Ingrese todos los datos");
        return false;
    }
    if(longitud == ""){
        alert("Ingrese todos los datos");
        return false;
    }
    if(altura == ""){
        alert("Ingrese todos los datos");
        return false;
    }
    if(nivel == ""){
        alert("Ingrese todos los datos");
        return false;
    }
    if(profundidad == ""){
        alert("Ingrese todos los datos");
        return false;
    }
    if(fecha == ""){
        alert("Ingrese todos los datos");
        return false;
    }
    if(propietario == "0"){
        alert("Ingrese todos los datos");
        return false;
    }
   

    $.ajax({
        type: 'POST',
        url: '../Controladores/datosDePozos/editarDatos.php',
        data: {id:idpozo,codigo:codigo, depto:depto, municipio:municipio, tipo:tipo, latitud:latitud,
        longitud:longitud, altura:altura, nivel:nivel, profundidad:profundidad, fecha:fecha, 
        propietario:propietario, estado:estado, geologia:geologia, observacion:observacion},
        success: function(respuesta) {
            
            if(respuesta==1){
                alert("Se edito correctamente "+respuesta);
                $(".tabla_ajax").load("../Vistas/tablaDatosPozos.php");
                $("#formPozosEdit")[0].reset();
                $(".editar-modal-lg").modal("hide");

            }
            if(respuesta==2){
                alert("No se pudieron editar los datos "+respuesta);
            }
            if(respuesta==3){
                alert("Las coordenadas ya existen "+respuesta);
            }
        },
        error: function(respuesta){
            alert("Error en el servidor "+respuesta);
        }
    });//fin de ajax


    return false;
   });//fin del click
   
});//fin del ready

function detalle(codigo, depto,nombreProp,nombreMuni,altura,profundidad,nivel,fecha,dui,tipo,estado,geologia,observacion){

    $("#cod").text(codigo);
    $("#dep").text(depto);
    $("#mun").text(nombreMuni);
    $("#prop").text(dui+" "+nombreProp);
    $("#alt").text(altura+" mtrs");
    $("#niv").text(nivel+" mtrs");
    $("#prof").text(profundidad+" mtrs");
    $("#fech").text(fecha);
    $("#tip").text(tipo);

    if(estado == 1){
        $("#est").text("EN USO");
    }else{
        $("#est").text("INACTIVO");
    }
    $("#geolo").val(geologia);
    $("#observa").val(observacion);

    $(".detalle-modal-lg").modal();
}

function ubicacion(latitud, longitud, codigo){

    var ruta = "verMapaPozo.php?lat="+latitud+"&lon="+longitud;

    $("#ubi").text(codigo);
    
    $("#iframe2").prop("src", ruta);

    $(".ubicacion-modal-lg").modal();
    
}
function editar(idpozo,cod,iddepto,idmuni,lat,lon,altura,profundidad,nivel,fecha,idprop,tipo,estado,geologia,observacion){

    $("#id").val(idpozo);
    $("#codigoEdit").val(cod);
    $("#deptoEdit").val(iddepto);
    $("#tipoEdit").val(tipo);
    
    $.ajax({
        type:'POST',
        url: '../Controladores/datosDePozos/extraerMunicipios.php',
        data:{depto:iddepto},
        success:function(data){
            if(data!= 0){
                $("#muniEdit").html(data);
                $("#muniEdit").val(idmuni);
            }
            else{
                $("#muniEdit").html("<option value='0' >No hay municipios para el departamento</option>");
            }
            
        },
        error:function(data){
            alert("error: "+data);
            
        }
    });//fin del ajax


    
    $("#latEdit").val(lat);
    $("#lonEdit").val(lon);
    $("#alturaEdit").val(altura);
    $("#profundidadEdit").val(profundidad);
    $("#nivelEdit").val(nivel);
    $("#fechaEdit").val(fecha);
    $("#propEdit").val(idprop);
    $("#estadoEdit").val(estado);
    $("#geologiaEdit").val(geologia);
    $("#observacionEdit").val(observacion);

    $(".cerrar").show();
     $("#formularioEditar").show();
    $("#mapaEdit").hide();

    $(".editar-modal-lg").modal();
}