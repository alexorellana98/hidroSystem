<?php
include_once '../conexion/php_conexion.php';
?>
<?php
include_once './editarVisitante.php';

?>



<!DOCTYPE html>
<html>
<head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
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
<link rel="stylesheet" href="../libreriasJS/alertifyjs/css/alertify.rtl.min.css">
  
</head>
<body>
<div class="row">
     <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
                  <div class="x_title">
                    <h2>Registros Generales de Visitantes de Pozos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      
                       <div class="clearfix"></div>
                       </li>
           
             </ul>
             <div class="clearfix"></div>
              </div>

      <div class="x_content">
        <p class="text-muted font-13 m-b-30"></p>
         <table id="datatable" class="table table-striped table-bordered">

                    <thead>
                        <tr>
                            
                            
                           
                            <th width="500"><font color="black">Nombre</font></th>
                             <th width="150"><font color="black">Dui</font></th>
                            <th width="150"><font font color="black">Genero</font></th>
                            <th width="100"><font font font color="black">Tipo</font></th>
                            <th width="100"><font font font color="black">Celular</font></th>
                            <th width="10"><font font font font font color="black">Accion</font></th>
                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $pame = mysqli_query($conexion, "SELECT * FROM visitantes");
                        while ($row = mysqli_fetch_array($pame)) {
                            
                            $NombreVisita = $row['nombre'];
                            $duiVisita =$row['dui'];
                            $generoVisita=$row['genero'];
                            $tipoVisita=$row['tipo'];
                            $celularVisita=$row['celular'];
                            
                            
                            $pas=$row['id_visitante'];
                           
                            ?>
                            <tr>
                               
                                
                              
                                <td><?php echo $row['nombre']; ?></td>
                                  <td><?php echo $row['dui']; ?></td>
                                <td><?php echo $row['genero']; ?></td>
                                <td><?php echo $row['tipo']; ?></td>
                                <td><?php echo $row['celular']; ?></td>
                                
                                
                                 
                                  
                                </td>
                                <td><!--boton de modificar-->
                                  <div class="row">
                                    <div class="col-md-6">
                                        <a href="#" data-toggle="modal" data-target="#actualizarVisitante" onclick="Editar_visita('<?php echo $duiVisita; ?>','<?php echo $NombreVisita; ?>','<?php echo $generoVisita;?>','<?php echo $tipoVisita;?>','<?php echo $celularVisita;?>','<?php echo $pas;?>')" ><button type="button" class="btn btn-success"><i class="fa fa-pencil"></i></button></a>
                                
                                    </div>

                                    
                                  </div>
                                  </td>
                                  
                                    
               
                               
                               
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>

      </div>
      </div> 
      </div> 
</div><!-- Fin de ROW -->



 
 <!-- MODAL PARA inahabilitar A UN VISITANTE -->
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel"><font font font font color="black">Inactivar Visitante</font></h3> 
                </div>

                <div class="panel-body">

                    ¿Seguro que desea Inactivar al visitante?
                                       

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger btn-ok" >Inactivar</a>
                </div> 
            </div>
        </div> 
    </div>   
 
 <!-- MODAL PARA Habilitar A UN VISITANTE -->
<div class="modal fade" id="confirm-delet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal1" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel1"><font font font font color="black">Inactivar Visitante</font></h3> 
                </div>

                <div class="panel-body">

                    ¿Seguro que desea Habilitar al visitante?
                                       

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger btn-ok" >Habilitar</a>
                </div> 
            </div>
        </div> 
    </div>
 

<script>
    $('#confirm-delete').on('show.bs.modal', function(e){
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        $('.debug-url').html('Eliminar URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
    })
</script>
 <script>
    //accion para inhabilitar usuario
        $(document).ready(function(){
            
            $("#btnInhabilitar").click(function(){
                

                var idEliminar=$("#ide").val();

               // var usuario=$("#usuario").val();
              //  var nusuario=$("#nusuario").val();
                var idEliminar=$("#ide").val();
                
             

                var idEliminar=$("#ide").val();

            inhabilitar(idEliminar);
                
            });
            
        });
        
    </script>




</body>
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

    <script src="../libreriasJS/jquery_form/jquery.mask.min.js"></script>
  <script src="../libreriasJS/alertifyjs/css/alertify.min.js"></script>

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
</html>







<!-- aqui esta el modal-->

<script>
function Editar_visita(dui,nombre,genero,tipo,celular,pass){
    $("#duiVi").val(dui);
    $("#NombreVi").val(nombre);
    $("#generoVi").val(genero);
    $("#tipoVi").val(tipo);
    $("#celularVi").val(celular);
    $("#idDeActualizacion").val(pass);

}
</script>







