<?php

$guardo  = $_REQUEST["guardo"];
if($guardo==1){
msg("Los datos fueron almacenados con exito");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>HIDROSIS</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- inicio alertify -->
      <!-- include the style -->
      <link rel="stylesheet" href="../llibreriasJS/alertifyjs/css/alertify.css" />
      <!-- include a theme -->
      <link rel="stylesheet" href="../libreriasJS/alertifyjs/css/themes/default.css" />
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  
    <script type="text/javascript"> 
    function verImagen(id){
  
   $.ajax(
     {
       type:"POST",
       url:"imagenEquipo.php",
       data:"id="+id,
       success:function(r){
         $('#imagenRecuperada').html(r);
        // ponerAbreviatura();
       }
     });
 }
      function validar(){
   
          if( document.getElementById('tipo').value=="Seleccione" ){
            alert("Complete los campos");
          }else{
              document.turismo.submit();
            }
        }
        function editar(id,nom,marca,num,don,tip,des,estado)
        {
         
          $("#nombr").val(nom);
          $("#mar").val(marca);
          $("#nume").val(num);
          $("#dona").val(don);
          $("#tipo").val(tip);
          $("#descri").val(des);
          $("#est").val(estado); 
          $("#DetalleModal").modal();
        
        }
        function edit(id,nom,marca,num,don,tip,des,estado)
        {
         // document.getElementById("baccion2").value=id;
         // document.getElementById("nom").value=nom;
         // document.getElementById("marc").value=marca;
         // document.getElementById("num").value=num;
         // document.getElementById("descr").value=des;
         // document.getElementById("donad").value=don;
         $("#baccion2").val(id);
          document.getElementById("tipou").value=tip;
          document.getElementById("esteq").value=estado;
         $("#nomb").val(nom);
        $("#marc").val(marca);
          $("#num").val(num);
          $("#donad").val(don);
          $("#descr").val(des);
          $("#ModifiModal").modal();
        //Ya manda todos los datos correcatamente
          
          
        }
        
      </script>

      <script>
$("#enviarimagenes").on("submit", function(e){
  e.preventDefault();
  var formData = new FormData(document.getElementById("enviarimagenes"));

  $.ajax({
    url: "../Controladores/subir.php",
    type: "POST",
    dataType: "HTML",
    data: formData,
    cache: false,
    contentType: false,
    processData: false
  }).done(function(echo){
    $("#mensaje").html(echo);
  });
});
</script>

  </head>
  <!--Aqui va el javascript-->


  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
             <!-- sidebar menu -->
             <?php 
               include "menuPrincipal.php";
            ?>
            <!-- /sidebar menu -->

            <!-- /menu profile quick info -->

            <br />

           

            <!-- /menu footer buttons -->
           
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  Administrador
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    
                  </ul>
                </li>


              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Equipos</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <!-- <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div> -->
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Formulario de ingreso de datos</h2>
                    <ul class="nav navbar-right panel_toolbox">                   
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form name="form" method="post" action="../Controladores/guardarequipo.php" enctype="multipart/form-data">

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Nombre del equipo<small class="text-muted"></small></label>
                        <input type="text" class="form-control has-feedback-left" name="nombre" id="nombre" placeholder="Nombre" required>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Marca<small class="text-muted"></small></label>
                        <input type="text" class="form-control has-feedback-left" name="mark" id="mark" placeholder="Marca" required>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Numero de serie<small class="text-muted"></small></label>
                        <input type="text" class="form-control has-feedback-left" name="numserie" id="numserie" placeholder="Numero de Serie" required>
                        <span class="fa fa-list-ol form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Donantes<small class="text-muted"></small></label>
                        <input type="text" class="form-control has-feedback-left" name="Donantes" id="donadores" placeholder="Donadores" required>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label>Tipo de Equipo<small class="text-muted"></small></label>
                          <select class="form-control" name="tipo">
                            <option value="Seleccione" selected hidden>Seleccione</option>
                            <option>Pluviometro</option>
                            <option>Agrometeorologico</option>
                            <option>Estación Meteorologica</option>
                            <option>Otros</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label>Estado del equipo<small class="text-muted"></small></label>
                          <select class="form-control" name="estado">
                            <option selected hidden>Seleccione</option>
                            <option>En uso</option>
                            <option>En mal estado</option>
                            <option>Extraviado</option>
                            </select>
                        </div> 
                      </div>

                      <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <label>Foto (PNG,JPG,JPE)<small class="text-muted"></small></label>
                            <input name="imagen" type="file" onChange="ver(form.file.value)" required accept="image/jpg,image/png,image/jpeg"> 
                        </div> 
                      </div>


                   
                      <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <label>Descripción<small class="text-muted"></small></label>
                      <textarea style="width: 1065px;" rows="3" size="100" value="" class="form-control" name="descripcion" placeholder="Descripción" id="descripcion"></textarea>
                      </div>
                      </div>
                   
                      
                      <div class="form-group">
                      
                        <!--Este div es para que agarre la linea que separa los botones.-->
                      </div>
                       
                      <div class="form-group">
                        <!--Este div es para que agarre la linea que separa los botones.-->
                      </div>
                     
                   
                      <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback" style="padding-bottom:10px;">
                      
                         
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group" style="margin-top:50px;margin-left:300px">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="submit" onclick="validar()" class="btn btn-success">Guardar</button>
                          <button type="reset" class="btn btn-warning">Cancelar</button>
               <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                         
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>      
            </div>

           
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de Equipos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                        <th>Nombre</th>
                          <th>Descripción</th>
                          <th>Tipo de Equipo</th>
                          <th>Marca</th>
                          <th>Numero de serie</th>
                          <th>Donador</th>
                          <th>Estado</th>
                      
                          <th>Observar</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody class="tabla_ajax">
                      <?php include('../Controladores/tablaEquipos.php') ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

        
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
       <?php 
       include "footer.php";
       ?>
        <!-- /footer content -->
      </div>
    </div>
     <!-- MODAL PARA VER FOTO ESTACION -->
  <div class="modal fade" id="confirm-imagen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel"><font font font font color="black">Fotografia de Equipo.</font></h3> 
                </div>

                <div class="panel-body" name="imagenRecuperada" id="imagenRecuperada">
                        
                                       

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-warning pull-right" data-dismiss="modal">Cerrar</button>
                    
                </div> 
            </div>
        </div> 
    </div> 
    <!--Modificacion modal-->
    <div class="modal fade modifi-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="ModifiModal">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><strong><i class="fa fa-list-ul fa-2x"></i></strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="row">
                  <table class="table table-bordered">
                  
                    
                      <thead>
                        <tr><th colspan=5 style="text-align:center;">Modificar Equipo </th></tr>
                    </table>
                    <input type="hidden" id="id" name="id" value="">
                    <form id="modifi">
                    <input type="hidden" name="baccion2" id="baccion2">
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Nombre del Equipo<small class="text-muted"></small></label>
                        <input type="text" class="form-control has-feedback-left" name="nomb" id="nomb">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Marca<small class="text-muted"></small></label>
                        <input type="text" class="form-control has-feedback-left" name="marc" id="marc">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Numero de Serie<small class="text-muted"></small></label>
                        <input type="text" class="form-control has-feedback-left" name="num" id="num">
                        <span class="fa fa-list-ol form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Donante<small class="text-muted"></small></label>
                        <input type="text" class="form-control has-feedback-left" name="donad" id="donad">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>

                         
                         <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <label>Tipo de uso<small class="text-muted"></small></label>
                          <select id="tipou"  class="form-control" name="tipou" onchange="verificar()">
                            <option>Pluviometro</option>
                            <option>Agrometeorologico</option>
                            <option>EstaciÛn Meteorologica</option>
                            <option>Otros</option>
                            </select>
                        </div>
                      
                    
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <label>Estado del equipo<small class="text-muted"></small></label>
                          <select id="esteq" class="form-control" name="esteq" onchange="verificar()">
                           
                            <option>En uso</option>
                            <option>En mal estado</option>
                            <option>Extraviado</option>
                            </select>
                        </div> 
                     


                        
                        <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <label>DescripciÛn<small class="text-muted"></small></label>
                      <textarea style="width: 850px;" rows="3" size="100" value="" class="form-control" name="descr" id="descr"></textarea>
                      </div>

                      </div>
                  </div>
                  <div class="form-group">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                         
                          <label>Modificar Foto (PNG,JPG,JPE)<small class="text-muted"></small></label>
                           <button id="btnimg" name="btnimg" class="btn btn-info">Cambiar imagen</button>
                            
                      </div>
                
                  
                  
                </div>
                <div class="modal-footer">
                  
                  <button name="btnmodi" class="btn btn-primary" data-dismiss="modal" id="guardar">Modificar</button>
                </div>
                </form>
                </div><!--Fin del content-->
              </div>
         </div>  
      
      <!--Modificacion modal-->
     <!--Detalle modal-->

     <div class="modal fade detalle-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="DetalleModal">
      
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><strong><i class="fa fa-list-ul fa-2x"></i></strong></h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="row">
                  <table class="table table-bordered">
                  
                    
                      <thead>
                      <tr><th colspan=5 style="text-align:center;">Detalle Equipo </th></tr>
                    </table>
                    <input type="hidden" id="id" name="id" value="">
                   
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Nombre del Equipo<small class="text-muted"></small></label>
                        <input type="text" class="form-control has-feedback-left" name="nombr" id="nombr" disabled>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Marca<small class="text-muted"></small></label>
                        <input type="text" class="form-control has-feedback-left" name="mar" id="mar" disabled>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Numero de Serie<small class="text-muted"></small></label>
                        <input type="text" class="form-control has-feedback-left" name="nume" id="nume" disabled>
                        <span class="fa fa-list-ol form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Donante<small class="text-muted"></small></label>
                        <input type="text" class="form-control has-feedback-left" name="dona" id="dona" disabled>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Tipo de Uso<small class="text-muted"></small></label>
                        <input type="text" class="form-control has-feedback-left" name="tipo" id="tipo" disabled>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Estado del Equipo<small class="text-muted"></small></label>
                        <input type="text" class="form-control has-feedback-left" name="est" id="est" disabled>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                      <label>Descripción<small class="text-muted"></small></label>
                      <textarea style="width: 865px;" rows="3" size="100" value="" class="form-control" name="descri" id="descri" disabled></textarea>
                      </div>


                  </div>
               
                    
                
                  
                  
                </div>
                <div class="modal-footer">
                  
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                </div>

                
                </div><!--Fin del content-->
                
               
              </div>
         </div>  
         </div>
      
      <!--Detalle modal-->
      
      
      <script src="../libreriasJS/alertifyjs/alertify.css"></script>
   <script src="../libreriasJS/alertifyjs/alertify.min.js"></script>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
        $("#btnimg").on("click",function(){
            var id=$("baccion2").val();
            alert("hi"+id);
            location.href="editImagenEquipo.php";
        });
        });
  $(document).ready(function(){
    $('#datatables-example').DataTable();
  });
  $(document).ready(function(){
    $('#datatables-example').DataTable();

    $("#guardar").on('click',function(){
     
        var id=$('#baccion2').val();
        var nomb = $('#nomb').val();
        var marc = $('#marc').val();
        var num = $('#num').val();
        var donad = $('#donad').val();
        var tipou = $('#tipou').val();
        var esteq = $('#esteq').val();
        var descr = $('#descr').val();
        var img = $('#imagen2').val();
       
//        if(nomb == ""){
//          alert("Nombre incorrecto");
//            return false;
//        }
//        if(marc == ""){
//            alert("Ingrese Marca");
//            return false;
//        }
//        if(num == ""){
//          sweetError("Ingrese Numero de Serie");
//            return false;
//        }

        var todo = $("#modifi").serialize();

        $.ajax({
            type: 'post',
            url: 'editarEquipo.php',
            data: todo,
            success: function(respuesta) {

                $("#ModifiModal").modal('hide');
                alert(respuesta);
                $(".tabla_ajax").load("../Controladores/tablaEquipos.php"); 
                //$('#datatables-example').DataTable();
            },
            error: function(respuesta){
              alert("Error en el servidor: "+respuesta); 
            }
        });//fin de ajax*/

      return false;
    });//fin del click
    
  });//fin del ready

</script>
<!-- end: Javascript -->
  </body>
</html>
<?php
function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo"alert('$texto');";
    echo "</script>";
}
 function msgError($texto)
{
    echo "<script type='text/javascript'>";
    echo "sweetConfirm('$texto');";
    //echo "document.location.href='materias.php';";
    echo "</script>";
}
 ?>