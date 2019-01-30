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
    
    setTimeout('redireccion()',2000);
}

function redireccion(){
    document.location.href='asignacionEquipos.php';
}
function verificar(opcion){
    alertify.set('notifier','position', 'top-right');
    var enviar=true;
    var observador=$('#observador').val();
    var equipo=$('#equipo').val();
    var fecha=document.getElementById("fecha").value;
    //alertify.success("Exito Datos almacenados");  
    //alert("esta llegando");
    if(opcion==="guardar"){
        //detener();
            if(observador==0 && equipo==0 && fecha===""){
            alertify.warning('Seleccione los campos');
            enviar=false;
            }
            else if(observador==0){alertify.warning('Seleccionar el <b>Observador</b>');  enviar=false;  }
            else if(equipo==0){alertify.warning('Seleccionar el <b>Equipo</b>');  enviar=false;  }
            else if(fecha===""){alertify.warning('Seleccione la <b>Fecha</b>');  enviar=false;  }
        
        
        
    }
    
    if(enviar && opcion==="guardar"){
        document.getElementById("bandera").value=opcion;
        document.formasignacion.submit();
    }
}
function detener(){
        $("#formasignacion").submit(function () {
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


















