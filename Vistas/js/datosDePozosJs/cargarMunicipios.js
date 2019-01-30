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
                    
                    if(data != "0" || data != ""){
                        $("#municipio").empty();
                        $("#municipio").append(data);

                    }
                    if(data == "0"){
                        alert("llega");
                        $("#municipio").empty();
                        $("#municipio").append("<option value='0' >No hay municipios para el departamento</option>"); 
                    }
                    
                    
                },
                error:function(data){
                    alertify.error("error" +data);
                    
                }
            });
        }
            

    });
});