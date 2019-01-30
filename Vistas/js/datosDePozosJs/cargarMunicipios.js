$(document).ready(function(){


    $("#departamento").on("change", function(){

        var depto = $("#departamento").val();
        //alert("llega");
        if(depto != ""){
            //alert("llega");
            $.ajax({
                type:'POST',
                url: '../Controladores/datosDePozos/extraerMunicipios.php',
                data:{depto:depto},
                success:function(data){
                    alertify.success("Datos almacenados con exito");
                    
                    
                },
                error:function(data){
                    alertify.error("error" +data);
                    
                }
            });
        }
            

    });
});