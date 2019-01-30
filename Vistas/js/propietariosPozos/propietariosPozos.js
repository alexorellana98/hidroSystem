function verificarCodigo(opcion) {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("cambiaso").innerHTML = xmlhttp.responseText;
            var paso = document.getElementById('baccionVer').value;
            //alert(paso);
            if (paso == 0) {
                if(opcion=="dui"){
                    alertify.warning("Error <b>DUI</b> ya se encuentra registrado");
                document.getElementById('dui').focus();
                document.getElementById('dui').value = "";
                }else if(opcion=="correo"){
                    alertify.warning("Error <b>Correo electrónico</b> ya se encuentra registrado");
                document.getElementById('correo').focus();
                document.getElementById('correo').value = "";
                }
            }
        }
    }
        if (opcion === "dui") var modelo = document.getElementById('dui').value;
        else if (opcion === "correo") var modelo = document.getElementById('correo').value;
        xmlhttp.open("post", "existeCorreoDui.php?codigo=" + modelo + "&opcion=" + opcion, true);
        xmlhttp.send();
}

function cambios(opcion,id,nombre){
    alertify.set('notifier','position', 'top-right');
    if(opcion==='modificar'){
        alertify.confirm('Confirmación', 'Desea modificar al propietario '+nombre, function(){ document.location.href="propietariospozos.php?id="+id; }
                , function(){ alertify.warning('Cancelado')});
    }
    if(opcion==='activar'){
        alertify.confirm('Confirmación', 'Desea activar al propietario '+nombre, function(){ ajaxCambioEstado(1,id); }
                , function(){ alertify.warning('Cancelado')});
    }
    if(opcion==="desactivar"){
        alertify.confirm('Confirmación', 'Desea deshabilitar al propietario '+nombre, function(){ ajaxCambioEstado(0,id); }
                , function(){ alertify.warning('Cancelado')});
    }
}


function cancelar(){
    alertify.confirm('Confirmación', 'Desea cancelar el proceso', function(){redireccion(); }
                , function(){});
}
function alerta(opcion,tipo){
        alertify.set('notifier','position', 'top-right');
    if(opcion==="exito"){
        alertify.success("Exito Datos almacenados");       
    }
    else if(opcion==="error")
        alertify.warning('Error Datos no almacenados');
    
    if(tipo=="modificar"){
        document.getElementById("btnCancelar").disabled=true;
        document.getElementById("btnModificar").disabled=true;
    }else if(tipo=="guardar"){
        document.getElementById("btnCancelarG").disabled=true;
        document.getElementById("btnGuardar").disabled=true;
    }
    setTimeout('redireccion()',2000);
}

function redireccion(){
    document.location.href='propietariosPozos.php';
}
function verificar(opcion){
    alertify.set('notifier','position', 'top-right');
    var enviar=true;
    var dui=document.getElementById("dui").value;
    var telefono=document.getElementById("telefono").value;
    var correo=document.getElementById("correo").value;
    var celular=document.getElementById("celular").value;
    var sexo=document.getElementById("sexo").value;
    var direccion=document.getElementById("direccion").value;
    var nombre=document.getElementById("nombre").value;
    var apellido=document.getElementById("apellido").value;
    var sitio=document.getElementById('sitio').value;
    var tipoPropietario=document.getElementById('tipoPropietario').value;
    var institucion=document.getElementById('institucion').value;
    if(opcion==="guardar" || opcion==="modificar"){
        detener();
        if(tipoPropietario==="persona"){
            if(dui==="" && telefono==="" && correo==="" && celular==="" && sexo==="0" && direccion==="" && nombre==="" && apellido===""){
            alertify.warning('Complete los campos');
            enviar=false;
            }
            else if(dui===""){alertify.warning('Complete el campo <b>DUI</b>');  enviar=false;  }
            else if(nombre===""){alertify.warning('Complete el campo <b>Nombre</b>');  enviar=false;  }
            else if(telefono===""){alertify.warning('Complete el campo <b>Telefono</b>');  enviar=false;  }
            else if(direccion===""){alertify.warning('Complete el campo <b>Direccion</b>');  enviar=false;  }
            else if(correo===""){alertify.warning('Complete el campo <b>Correo</b>');  enviar=false;  }
            else if(apellido===""){alertify.warning('Complete el campo <b>Apellido</b>');  enviar=false;  }
            else if(celular===""){alertify.warning('Complete el campo <b>Celular</b>');  enviar=false;  }
            else if(sexo==="0"){alertify.warning('Seleccione un <b>Genero</b>');  enviar=false;  }
        }else if(tipoPropietario==="institucion"){
            if(sitio==="" && telefono==="" && correo==="" && celular===""  && direccion==="" && institucion===""){
            alertify.warning('Complete los campos');
            enviar=false;
            }            
            else if(sitio===""){alertify.warning('Complete el campo <b>Sitio web</b>');  enviar=false;  }
            else if(telefono===""){alertify.warning('Complete el campo <b>Telefono</b>');  enviar=false;  }
            else if(direccion===""){alertify.warning('Complete el campo <b>Direccion</b>');  enviar=false;  }
            else if(correo===""){alertify.warning('Complete el campo <b>Correo</b>');  enviar=false;  }
            else if(institucion===""){alertify.warning('Complete el campo <b>Institución</b>');  enviar=false;  }
        }
        
        
    }
    
    if(enviar && opcion==="guardar" || opcion==="modificar"){
        document.getElementById("bandera").value=opcion;
        document.formPropietario.submit();
    }
    if(opcion==="dui"){
        var valor = document.getElementById('dui').value;
        if (!(/^[0-9]{8}\-[0-9]{1}$/.test(valor))) {
            alertify.warning('Ingrese un <b>dui</b> valido');
            document.getElementById("dui").value="";
        }else{
            verificarCodigo('dui');
        }
    }
    if(opcion==="telefono"){
        var valor = document.getElementById('telefono').value;
        if (!(/^[2]{1}[0-9]{3}\-[0-9]{4}$/.test(valor))) {
            alertify.warning('Ingrese un <b>Telefono</b> valido');
            document.getElementById("telefono").value="";
            
        }
    }
    if(opcion==="celular"){
        var valor = document.getElementById('celular').value;
        if (!(/^[6|7]{1}[0-9]{3}\-[0-9]{4}$/.test(valor))) {
            alertify.warning('Ingrese un <b>Celular</b> valido');
            document.getElementById("celular").value="";
            alertify.warning('El <b>Celular</b> debe iniciar con 6 0 7');
        }
    }
    if(opcion==="correo"){
        var valor=document.getElementById('correo').value;
        if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor)){       verificarCodigo('correo');    
        }else{
            alertify.warning('Ingrese un <b>Correo</b> valido');
            document.getElementById("correo").value="";
        }
    }
}
function detener(){
        $("#formPropietario").submit(function () {
             return false;
        });
}
function soloLetras(e) {
    alertify.set('notifier','position', 'top-right');
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
            especiales = [8, 37, 39, 46];
            tecla_especial = false;
            for (var i in especiales) {
                if (key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }
            if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                alertify.warning("<b>Error: </b>Solo se permiten letras");
                return false;
            }
        }
function ajaxCambioEstado(opcion, id) {
    alertify.set('notifier','position', 'top-right');
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("cambioEstado").innerHTML = xmlhttp.responseText;
            var quepaso=document.getElementById('quepaso').value;
            if(quepaso=="1")
                alertify.success("Exito");
            else if(quepaso=="0")
                alertify.warning("Error");
            cambio(1);//Para actualizar la tabla con ajax
                
        }
    }
    xmlhttp.open("post", "ajaxPropietario.php?opcion=" + opcion+"&actualiza=cambioEstado"+"&id="+id, true);
    xmlhttp.send();
}

function actualizarModalPropietario(str, opcion) {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("cargala").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("post", "ajaxPropietario.php?idd=" + opcion+"&actualiza=modal", true);
    xmlhttp.send();
}
function cambio(opcion) {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("contenidoTabla").innerHTML = xmlhttp.responseText;
            $('.tablita').DataTable();
            if(opcion=='0'){
                $("#divInactivos").hide();
                $("#divActivos").show();
            }else if(opcion=="1"){
                $("#divInactivos").show();
                $("#divActivos").hide();
            }
        }
    }
    xmlhttp.open("post", "ajaxPropietario.php?opcion=" + opcion+"&actualiza=tabla", true);
    xmlhttp.send();
}

function mostrarFormulario(opcion){
    if(opcion==="persona"){
        document.getElementById("tipoPropietario").value="persona";
        $("#divSitio").hide();
        $("#divDui").show();
        $("#divInstitucion").hide();
        $("#datosPersona").show();
        $("#divBotones").show();
        $("#divNombre").show();
        $("#divGenero").show();
    }
    if(opcion==="insti"){
        document.getElementById("tipoPropietario").value="institucion";
        $("#divSitio").show();
        $("#divDui").hide();
        $("#divInstitucion").show();
        $("#datosPersona").show();
        $("#divBotones").show();
        $("#divNombre").hide();
        $("#divGenero").hide();
    }
}


















