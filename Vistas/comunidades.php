<?php include"comunidadConexion.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>Ingenieria de Software</title>

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
      
  <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- alertify -->
    <link rel="stylesheet" href="../libreriasJS/alertifyjs/css/alertify.css"/>
    <link rel="stylesheet" href="../libreriasJS/alertifyjs/css/alertify.min.css"/>
    <link rel="stylesheet" href="../libreriasJS/alertifyjs/css/themes/bootstrap.css"/>
    <script src="../libreriasJS/alertifyjs/alertify.js"></script>
    <script src="../libreriasJS/alertifyjs/alertify.min.js"></script>
  
  <script type="text/javascript" >

 function validar(){
    var nombre,departamento,municipio,observador,tcomunidad,tinstitucion;
    nombre = document.getElementById("nombre").value;
    departamento =document.getElementById("departamento").value;
    municipio = document.getElementById("municipio").value;
    observador = document.getElementById("observador").value;
    

 if(nombre =='' || municipio =='' || observador =='' || departamento == '' || (!document.getElementById('tcomunidad').checked && !document.getElementById('tinstitucion').checked) ){
alert("por favor llenar todos los campos");
return false;
 }
  }  	

    function buscarM(str,opcion){
  //alert(str);

  if (str==""){
    document.getElementById("buscarMunicipio").innerHTML="";
    document.getElementById("buscarMunicipios").innerHTML="";
    return;
  }
      if (window.XMLHttpRequest){ // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();}
      else  {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function(){
          if (xmlhttp.readyState==4 && xmlhttp.status==200){
            if (opcion === 'buscarMunicipio') {
                    document.getElementById("buscarMunicipio").innerHTML=xmlhttp.responseText;
                } else if (opcion === 'buscarMunicipios') {
                    document.getElementById("buscarMunicipios").innerHTML=xmlhttp.responseText;
                } 
            
          }
        }
        if (opcion === "buscarMunicipio") 
            xmlhttp.open("GET","comunidades1.php?opcion="+ opcion +"&criterio="+str,true);
        else if(opcion === "buscarMunicipios")
            xmlhttp.open("GET","comunidades1.php?opcion="+ opcion +"&criterio="+str,true);
            xmlhttp.send();
  
   }



   function buscarO(str){
  //alert(str);

  if (str==""){document.getElementById("buscarResponsable").innerHTML="";return;}
      if (window.XMLHttpRequest){ // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();}
      else  {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function(){if (xmlhttp.readyState==4 && xmlhttp.status==200){document.getElementById("buscarResponsable").innerHTML=xmlhttp.responseText;}}

      xmlhttp.open("GET","comunidades1.php?opcion=buscarResponsable&criterio="+str,true);
      xmlhttp.send();
  
   }

  </script>
      
      <script type="text/javascript"> 


        function editar(id,nom,tipo,depto,municipio,inst)
        {
         
          $("#nomb").val(nom);
          $("#tip").val(tipo);
          $("#nomdepto").val(depto);
          $("#municip").val(municipio);
          $("#inst").val(inst);
          $("#DetalleModal").modal();
         
        
          
          
        }

        function edit(str, opcion) {
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }else {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("cargaAct").innerHTML = xmlhttp.responseText;
                }
            }
                
            xmlhttp.open("post", "cargaModalModicomunidad.php?idd=" + opcion , true);
            xmlhttp.send();
        }

        
        
      </script>

  </head>

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
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
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
                    <img src="images/img.jpg" alt="">Erick Ticas
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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
                <h3>Instituciones y Comunidades</h3>
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
                    <h2>Ingreso de datos</h2>
                    <ul class="nav navbar-right panel_toolbox">                   
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                  <form class="form-horizontal form-label-left input_mask" action="gcomunidad.php" method="post" onsubmit="return validar()">

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left"  id="nombre" name="nombre" placeholder="Nombre de la  institución o comunidad." required>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                        
                        <div class="form-group">

                      <div class="col-md-6 col-sm-6 col-xs-12" required>
                          <select class="form-control" id="departamento" name="departamento" onchange="buscarM(this.value,'buscarMunicipio')">
                            <option value="0" >Departamento</option>
                            <?php
                              $query = $mysqli -> query ("SELECT * FROM departamentos");
                              while ($valores = mysqli_fetch_array($query)) {
                              echo "<option value=".$valores['iddepto'].">".$valores['nombredepto']."</option>";}
                            ?>
                            </select>
                        </div>
                    </div>

						 <div class="col-md-6 col-sm-6 col-xs-12" id="buscarMunicipio" >
                          <select class="form-control" id="municipio" name="municipio" onchange="buscarO(this.value)" required>
                            <option value="0" >Municipio</option>
                            </select>
                        </div>
                      
                              <div class="form-group">

                        <div class="col-md-6 col-sm-6 col-xs-12" id="" >
                          <select class="form-control" id="observador" name="observador" required>
                            <option value="0">Responsable de la institución o comunidad</option>
                              <?php
                              $query = $mysqli -> query ("SELECT * FROM respestaciones");
                              while ($valores = mysqli_fetch_array($query)) {
                              echo "<option value=".$valores['idresponsable'].">".$valores['institucion']."</option>";}
                            ?>
                            </select>
                        </div>
                    
                        
                

                       

                        <br>
                        <br>
                        <br>
                        <div class="input-group " style="padding-bottom:25px;" >
     </i><span class="label label-default" style="width: 100px; font-size: 15px;margin-right:20px;margin-left:20px">Tipo</span>
     <label class="radio-inline" style="width: 100px; font-size: 15px"><input type="radio" name="optradio" id="tcomunidad" value="Comunidad"   >Comunidad</label>
     <label class="radio-inline" style="width: 100px; font-size: 15px"><input type="radio" name="optradio" id="tinstitucion" value="Institucion">Institución</label> 
     </div>
     
                        
                      

                        
                        <div class="form-group">
                        <!--Este div es para que agarre la linea que separa los botones.-->
                      </div>
                     
                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group" style="margin-top:50px;margin-left:300px">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3 ">
                        <button type="submit" class="btn btn-success" >Guardar</button>
                          <button type="reset" class="btn btn-warning">Cancelar</button>
						   <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                         
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>      
            </div>

          

        
          </div>
        </div>
        <!-- /page content -->
          
           <div class="form-group">
                      
                        <!--Este div es para que agarre la linea que separa los botones.-->
                      </div>
                       
                      <div class="form-group">
                        <!--Este div es para que agarre la linea que separa los botones.-->
                      </div>
                     
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de Instituciones y Comunidades</h2>
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
                            <th hidden> </th> 
                        <th>Nombre</th> 
                          <th>Tipo</th>
                          <th>Departamento</th>
                          <th>Municipio</th>
                          <th>Institucion responsable</th>
                            <th> </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      <?php include('../Controladores/tablaComunidades.php') ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          

        <!-- footer content -->
       <?php 
       include "footer.php";
       ?>
        <!-- /footer content -->
      </div>
    </div>
    
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
                      <tr><th colspan=5 style="text-align:center;">Detalle Instituciones y Comunidades </th></tr>
                    </table>
                    <input type="hidden" id="id" name="id" value="">
                   
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Nombre de la Comunidad<small class="text-muted"></small></label>
                        <input type="text" class="form-control has-feedback-left" name="nomb" id="nomb" disabled>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Tipo<small class="text-muted"></small></label>
                        <input type="text" class="form-control has-feedback-left" name="tip" id="tip" disabled>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Departamento<small class="text-muted"></small></label>
                        <input type="text" class="form-control has-feedback-left" name="nomdepto" id="nomdepto" disabled>
                        <span class="fa fa-list-ol form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Municipio<small class="text-muted"></small></label>
                        <input type="text" class="form-control has-feedback-left" name="municip" id="municip" disabled>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Institucion Responsable<small class="text-muted"></small></label>
                        <input type="text" class="form-control has-feedback-left" name="inst" id="inst" disabled>
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
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
         
    <!--Modificacion modal-->
    <div class="modal fade" id="ModifiModal" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <center>
                  <h3 class="modal-title" id="exampleModalLabel">Modificar Instituciones y comunidades</h3> </center>
              </div>
              <div class="modal-body" id="cargaAct">

              </div>
              
                <div class="modal-footer">
                  <button name="btnmodi" class="btn btn-primary" data-dismiss="modal" id="guardar">Modificar</button>
                </div>
            </div>
          </div>
        </div>
     
      
      <!--Modificacion modal-->

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
         <script src="../libreriasJS/alertifyjs/alertify.min.js"></script>

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
    $('#datatables-example').DataTable();
  });
  $(document).ready(function(){
    $('#datatables-example').DataTable();

    $("#guardar").on('click',function(){
     
        var id=$('#baccion2').val();
        var nomb = $('#nombr').val();
        var marc = $('#tipp').val();
        var num = $('#nombdepto').val();
        var donad = $('#municipi').val();
        var tipou = $('#insti').val();
        
       
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
            url: 'editarComunidad.php',
            data: todo,
            success: function(respuesta) {
              if(respuesta == 1){
                $("#ModifiModal").modal('hide');
                 
                //location.href = ("comunidades.php");
                alertify.set('notifier','position','top-right');
                alertify.success('Se editaron los datos correctamente');
                setTimeout (function llamarPagina(){
                                        location.href=('comunidades.php');
                                     }, 1000);
              }else{
                alertify.set('notifier','position','top-right');
                alertify.error('Error al editar los datos!');
              }

                
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
