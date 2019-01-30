$(document).ready(function(){
    $('#btnguardar').show();
    $('#btnactualizar').hide();
      $('#preview').hover(
        function() {
            $(this).find('a').fadeIn();
        }, function() {
            $(this).find('a').fadeOut();
        });
    
        $('#file-select').on('click', function(e) {
             e.preventDefault();
            
            $('#file').click();
        });
    
        $('input[type=file]').change(function() {
          var file = (this.files[0].name).toString();
          var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#preview img').attr('src', e.target.result);
            }
             
            reader.readAsDataURL(this.files[0]);

            var fileName = this.files[0].name;
          var fileSize = this.files[0].size;
        
          if(fileSize > 1000000){
            $('#img1').text("El archivo no debe superar 1MB");
            $('#img').removeClass('has-success').addClass('has-error');
            this.value = '';
            this.files[0].name = '';
          }else{
            // recuperamos la extensión del archivo
            var ext = fileName.split('.').pop();
        
            // console.log(ext);
            switch (ext) {
              case 'jpg':{
                $('#img2').text("");
                $('#img1').removeClass('has-error').addClass('has-success');
                break;
              }
              case 'jpeg':{
                $('#img2').text("");
                $('#img1').removeClass('has-error').addClass('has-success');
                break;
              }

              case 'png': {
                $('#img2').text("");
                $('#img1').removeClass('has-error').addClass('has-success');
                break;
              }
              default:{
              $('#img2').text("El archivo no tiene la extensión adecuada");
              $('#img1').removeClass('has-success').addClass('has-error');
                this.value = ''; // reset del valor
                this.files[0].name = '';
              }
            }
          }
        });
      
    $('input').on('keypress', function(e){
      if (e.keyCode == 13) {
        // Obtenemos el número del atributo tabindex al que se le dio enter y le sumamos 1
        var TabIndexActual = $(this).attr('tabindex');
        var TabIndexSiguiente = parseInt(TabIndexActual) + 1;
        // Se determina si el tabindex existe en el formulario
        var CampoSiguiente = $('[tabindex='+TabIndexSiguiente+']');
        // Si se encuentra el campo entra al if
        if(CampoSiguiente.length > 0)
        {
        CampoSiguiente.focus(); //Hcemos focus al campo encontrado
        return false; // retornamos false para detener alguna otra ejecucion en el campo
        }else{// Si no se encontro ningún elemento, se retorna false
        return false;
        }
      }
    });
    
    $.validator.addMethod("letrasOespacio", function(value, element) {
        return /^[ a-záéíóúüñ]*$/i.test(value);
    }, "Ingrese sólo letras o espacios.");

    $.validator.addMethod("alfanumOespacio", function(value, element) {
        return /^[ a-z0-9áéíóúüñ.,]*$/i.test(value);
    }, "Ingrese sólo letras, números o espacios.");

    $.validator.addMethod("numero", function(value, element) {
        return /^[ 0-9-()]*$/i.test(value);
    }, "Ingrese sólo números");

    $.validator.addMethod("correo", function(value, element) {
        return /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/i.test(value);
    }, "Ingrese un correo v&aacute;lido.");

    $("#fromregistro").validate({
      errorPlacement: function (error, element) {
            $(element).closest('.form-group').find('.help-block').html(error.html());
        },
        highlight: function (element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            $(element).closest('.form-group').find('.help-block').html('');
        },
      rules: {

        institucion: {
          alfanumOespacio: true,
          required: true,
          minlength: 7,
          maxlength: 50
        },
        responsable: {
          letrasOespacio: true,
          required: true,
          minlength: 7,
          maxlength: 50
        },

       telefono1: {
          numero: true,
          required: false,
          minlength: 9,
          maxlength: 9
        },

        telefono2: {
          numero: true,
          required: false,
          minlength: 9,
          maxlength: 9
        },


        direccion: {
          alfanumOespacio: true,
          required: true,
          minlength: 10,
          maxlength: 400
        }
       
      },

      messages: {
        institucion: {
          required: "Por favor, ingrese instituci&oacute;n.",
          maxlength: "Debe ingresar m&aacute;ximo 100 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 7 carácteres."
        },
        responsable: {
          required: "Por favor, ingrese responsable.",
          maxlength: "Debe ingresar m&aacute;ximo 80 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 7 carácteres."
        },

        telefono1: {
          required: "Por favor, ingrese teléfono.",
          maxlength: "Debe ingresar m&aacute;ximo 9 dígitos.",
          minlength: "Debe ingresar m&iacute;nimo 9 dígitos."
        },

        telefono2: {
          required: "Por favor, ingrese teléfono.",
          maxlength: "Debe ingresar m&aacute;ximo 9 dígitos.",
          minlength: "Debe ingresar m&iacute;nimo 9 dígitos."
        },
        direccion: {
          required: "Por favor, ingrese dirección.",
          maxlength: "Debe ingresar m&aacute;ximo 400 carácteres.",
          minlength: "Debe ingresar m&iacute;nimo 10  carácteres."
        }
        
      }
    });

   
 
});

function editar(id){
  var confirm= alertify.confirm('Confirmación','¿Desea modificar el registro?',null,null).set('labels', {ok:'Si', cancel:'No'}); 	

confirm.set({transition:'slide'});   	
 
confirm.set('onok', function(){ //callbak al pulsar botón positivo
  $('#quitar').remove();
  $.ajax({
    type: 'POST',
    url: '../../Vistas/ResponsablesEstaciones/obtenerDatos.php',
    data: {'id': id}
  })
  .done(function(obtenerDatos){
      var datos = eval(obtenerDatos);
      $('#btnguardar').hide();
      $('#btnactualizar').show();
      $('#actualizar').val(id);
      $('#institucion').val(datos[0]);
      $('#validarcampo').val(datos[0]);
      $('#responsable').val(datos[1]);
      $('#direccion').val(datos[2]);
      $('#telefono1').val(datos[3]);
      $('#telefono2').val(datos[4]);
      //revisar
      if(datos[5]==="<img id='quitar' src='data:image/*;base64,'/>"){
        $('#imagen').show();
      }else{
        $('#imagen').hide();
        $('#preview').append(datos[5]);
      }
                     
  })
  .fail(function(){
    alert('Hubo un error al cargar la Pagina')
  })

});
 
/*confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
    alertify.error('Has Cancelado el proceso');
});*/

  
}

function ver(id){
  
   $.ajax({
     type: 'POST',
     url: '../../Vistas/ResponsablesEstaciones/getDatos.php',
     data: {'id': id}
   })
   .done(function(listas_rep){
     $('.modal-body1').html(listas_rep)
     $('#datosResponsable').modal({show:true});
   })
   .fail(function(){
     alert('Hubo un error al cargar la Pagina')
   })
 
 }

  $("#telefono2").keypress(function(e) {
    if(e.which == 13) {
      if($('#btnguardar').is(':hidden')){
        $('#btnactualizar').click();
      }else{
        $('#btnguardar').click();
      }
    }
 });

 $("#institucion").blur(function() {
    var institucion = $("#institucion").val();
    var validarcampo = $("#validarcampo").val();
    var id = $("#actualizar").val();
    if(id===""){
        $.ajax({
          type: 'POST',
          url: '../../Vistas/ResponsablesEstaciones/validar_institucion.php',
          data: {'institucion': institucion}
        })
        .done(function(listas_re){
          if(listas_re!==""){
            $("#institucion").val("");
            $('#resultin').text("Nombre Ya Existe");
            $('#resultins').removeClass('has-success').addClass('has-error');
          }
        })
        .fail(function(){
          alert('Hubo un error al cargar la Pagina')
        })
      }else{
        if(institucion !== validarcampo){
          $.ajax({
            type: 'POST',
            url: '../../Vistas/ResponsablesEstaciones/validar_institucion.php',
            data: {'institucion': institucion}
          })
          .done(function(listas_re){
            if(listas_re!==""){
              $("#institucion").val("");
              $('#resultin').text("Nombre Ya Existe");
              $('#resultins').removeClass('has-success').addClass('has-error');
            }
          })
          .fail(function(){
            alert('Hubo un error al cargar la Pagina')
          })
        }
      }
    
});



  $("#btnguardar").click(function(){
    
    if($("#fromregistro").valid()){ 
                var formData = new FormData($("#fromregistro")[0]);
        
                $.ajax({
                  type: 'POST',
                  url: '../../Controladores/ResponsablesEstaciones/guardar_responsable.php',

                  //datos del formulario
                  data: formData,
                  //necesario para subir archivos via ajax
                  cache: false,
                  contentType: false,
                  processData: false,

                })
                .done(function(listas_rep){
                    if(listas_rep === "Exito"){
                      
                      $("#div_resultado_responsable").load('tabla_responsables.php');
                        $("#fromregistro")[0].reset();
                        $('#preview img').attr('src', '../images/img2.png');
                        alertify.set("notifier","position", "top-right");
                        alertify.success("Registro Almacenado Correctamente.");
                        
                    }
                    if(listas_rep === "Error"){
                      $("#fromregistro")[0].reset();
                      $('#preview img').attr('src', '../images/img2.png'); 
                      alertify.set("notifier","position", "top-right");
                      alertify.error("Sin Conexión a la Base de Datos.");
                    }                
                    })
                    .fail(function(){
                      alert('Hubo un error al cargar la Pagina')
                    })
                  }
    
});

$("#btnactualizar").click(function(){
  
  if($("#fromregistro").valid()){ 
           var formData = new FormData($("#fromregistro")[0]);
      
              $.ajax({
                type: 'POST',
                url: '../../Controladores/ResponsablesEstaciones/editar_responsable.php',

                //datos del formulario
                data: formData,
                //necesario para subir archivos via ajax
                cache: false,
                contentType: false,
                processData: false,

              })
              .done(function(lista_ac){
                  if(lista_ac === "Exito"){
                    
                    $("#div_resultado_responsable").load('tabla_responsables.php');
                      $("#fromregistro")[0].reset();
                      $('#preview img').attr('src', '../images/img2.png');
                      alertify.set("notifier","position", "top-right");
                      alertify.success("Registro Almacenado Correctamente.");
                      $('#btnguardar').show();
                      $('#btnactualizar').hide();
                      
                  }
                  if(lista_ac === "Error"){
                    $("#fromregistro")[0].reset();
                    $('#preview img').attr('src', '../images/img2.png');
                    alertify.set("notifier","position", "top-right");
                    alertify.error("Sin Conexión a la Base de Datos.");
                    $('#btnguardar').show();
                    $('#btnactualizar').hide();
                  }                
                  })
                  .fail(function(){
                    alert('Hubo un error al cargar la Pagina')
                  })
                }
  
});

function cancelar(){
  var confirm= alertify.confirm('Confirmación','¿Desea cancelar el proceso?',null,null).set('labels', {ok:'Si', cancel:'No'}); 	
 
confirm.set({transition:'slide'});   	
 
confirm.set('onok', function(){ //callbak al pulsar botón positivo
  document.location.href='responsablesestaciones.php';
  alertify.success('Éxito');
});
 
/*confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
    alertify.error('Has Cancelado el proceso');
});*/

}
