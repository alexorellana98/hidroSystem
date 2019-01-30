
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistema Hidrometeorologico</title>
 
        <!-- Bootstrap -->
        <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- Datatables -->
        <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="../build/css/custom.min.css" rel="stylesheet">
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">



                        <!-- /menu profile quick info -->

                        <br />

                        <!-- sidebar menu -->
                        <?php
                        include_once '../Vistas/menuPrincipal.php';
                        ?>
                        <!-- /sidebar menu -->

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
                                        <img src="images/img.jpg" alt="">Abigail
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    
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
                                <h3>Lecturas Estación<small></small></h3>
                            </div>

                            <div class="title_right">

                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Mostrar Lecturas <small></small></h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            
                                            
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Fecha</th>
                                                    <th>Hora</th>
                                                    <th>Out</th>
                                                    <th>Temp</th>
                                                    <th>Low Temp</th>
                                                    <th>Hum</th>
                                                    <th>Pt.</th>
                                                    <th>Speed</th>

                                                </tr>
                                            </thead>


                                            <tbody>  
                                                <?php
                                                include_once '../ParaLectura/PHPExcel/IOFactory.php';
                                                include_once '../ProcesoSubir/conexion.php';

                                                $nombreArchivo1 = $_GET['ir'];
                                                $id = $_GET['llego'];

                                                $nombreArchivo = $nombreArchivo1;

                                                $objPHPExcel = PHPEXCEL_IOFactory::load($nombreArchivo);

                                                $objPHPExcel->setActiveSheetIndex(0);

                                                $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

                                                date_default_timezone_set('America/El_Salvador');
                                                //date.timezone="Europe/Madrid";
                                                for ($i = 3; $i <= $numRows; $i++) {

//		$nombre = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
                                                    $fecha = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getValue();
                                                    $fecha = date($format = "d-m-Y", PHPExcel_Shared_Date::ExcelToPHP($fecha));
                                                    $nuevafecha = strtotime('+1 day', strtotime($fecha));
                                                    $nuevafecha = date('Y-m-d', $nuevafecha);

                                                    $hora = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getValue();



                                                    $lahora = ($hora * 86400) / 3600;
                                                    $minutos = ($lahora - floor($lahora)) * 60;
                                                    //$segundos=($hora*86400)-((floor($lahora)*3600)+$minutos*60);
                                                    $segundos = ($minutos - floor($minutos)) * 60;

                                                    $horaImprimir = floor($lahora) . ':' . floor($minutos) . ':' . floor($segundos);


                                                    //$hora=date($format="H:i:s",($hora));
                                                    ///$InvDate= $objPHPExcel->getActiveSheet()->setCellValue('B'.$i, PHPExcel_Shared_Date::PHPToExcel( $InvDate ));
                                                    // $otra= $objPHPExcel->getActiveSheet()
                                                    //    ->getStyle('B'.$i)
                                                    //  ->getNumberFormat()
                                                    //->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);

                                                    $out = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
                                                    $temp = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
                                                    $lowTemp = $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
                                                    $hum = $objPHPExcel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
                                                    $pt = $objPHPExcel->getActiveSheet()->getCell('G' . $i)->getCalculatedValue();
                                                    $speed = $objPHPExcel->getActiveSheet()->getCell('H' . $i)->getCalculatedValue();
                                                    $windDir = $objPHPExcel->getActiveSheet()->getCell('I' . $i)->getCalculatedValue();
                                                    $windRun = $objPHPExcel->getActiveSheet()->getCell('J' . $i)->getCalculatedValue();
                                                    $windSpeed = $objPHPExcel->getActiveSheet()->getCell('K' . $i)->getCalculatedValue();
                                                    $dir = $objPHPExcel->getActiveSheet()->getCell('L' . $i)->getCalculatedValue();
                                                    $chill = $objPHPExcel->getActiveSheet()->getCell('M' . $i)->getCalculatedValue();
                                                    $heatIndex = $objPHPExcel->getActiveSheet()->getCell('N' . $i)->getCalculatedValue();
                                                    $thwIndex = $objPHPExcel->getActiveSheet()->getCell('O' . $i)->getCalculatedValue();
                                                    $bar = $objPHPExcel->getActiveSheet()->getCell('P' . $i)->getCalculatedValue();
                                                    $rain = $objPHPExcel->getActiveSheet()->getCell('Q'.$i)->getCalculatedValue();
                                                    $rainRate = $objPHPExcel->getActiveSheet()->getCell('R'.$i)->getCalculatedValue();
                                                    $heatdd = $objPHPExcel->getActiveSheet()->getCell('S'.$i)->getCalculatedValue();
                                                    $cooldd = $objPHPExcel->getActiveSheet()->getCell('T'.$i)->getCalculatedValue();
                                                    $InTemp = $objPHPExcel->getActiveSheet()->getCell('U'.$i)->getCalculatedValue();
                                                    $InHum = $objPHPExcel->getActiveSheet()->getCell('V'.$i)->getCalculatedValue();
                                                    $InDew = $objPHPExcel->getActiveSheet()->getCell('W'.$i)->getCalculatedValue();
                                                    $InHead = $objPHPExcel->getActiveSheet()->getCell('X'.$i)->getCalculatedValue();
                                                    $InEmc = $objPHPExcel->getActiveSheet()->getCell('Y'.$i)->getCalculatedValue();
                                                    $Density = $objPHPExcel->getActiveSheet()->getCell('Z'.$i)->getCalculatedValue();
                                                    $Samp = $objPHPExcel->getActiveSheet()->getCell('AA'.$i)->getCalculatedValue();
                                                    $Tx = $objPHPExcel->getActiveSheet()->getCell('AB'.$i)->getCalculatedValue();
                                                    $Recet = $objPHPExcel->getActiveSheet()->getCell('AC'.$i)->getCalculatedValue();
                                                    $Arc = $objPHPExcel->getActiveSheet()->getCell('AD'.$i)->getCalculatedValue();
                                                    
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $nuevafecha; ?></td>
                                                        <td><?php echo $horaImprimir; ?></td>
                                                        <td><?php echo $out; ?></td>
                                                        <td><?php echo $temp; ?></td>
                                                        <td><?php echo $lowTemp; ?></td>
                                                        <td><?php echo $hum; ?></td>
                                                        <td><?php echo $pt; ?></td>
                                                        <td><?php echo $speed; ?></td>
                                                        

                                                    </tr>
    <?php
    //inserta en el mismo for -->JcMoz
    $sql = "INSERT INTO lecturaestaciones (idestacion,date,time,tempout,hitemp,lowtemp,outhum,dewt,windspeed,winddir,windrun,hispeed,hidir,windchill,heatindex,thwindex,bar,rain,rainrate,heatd_d,coold_d,intemp,inhum,indew,inheat,inemc,inairdensity,windsamp,windtx,issrecept,arcint) VALUE('$id','$nuevafecha','$horaImprimir','$out','$temp','$lowTemp','$hum','$pt','$speed','$windDir','$windRun','$windSpeed','$dir','$chill','$heatIndex','$thwIndex','$bar','$rain','$rainRate','$heatdd','$cooldd','$InTemp','$InHum','$InDew','$InHead','$InEmc','$Density','$Samp','$Tx','$Recet','$Arc')";
    $result = $mysqli->query($sql);
}
?>
                                            </tbody>
                                        </table>
                                        <div class="input-group">
                                            <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 15px;">

                                                <a href="../ProcesoSubir/SubirEstacion.php" class="btn">
                                                    <input type="submit" class="btn btn-success" value="Regresar" name="modGuardar">
                                                </a>
                                            </div>
                                            <br>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /page content -->
<!-- MODAL-->
            <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h4>¡Datos cargados con exito!</h4>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                           
                            <h4 class="modal-title" id="myModalLabel"></h4>
                        </div>
                        <div class="modal-body">
                            
                             <h4>¡Presione "x" para visualizarlos!</h4>
                             <div class="row mb-12"  style="text-align:center">

                                 <img src="../Imagenes/subir.jpg" width="200" height="200" style="text-align:center">
                                    
                                </div>
                             


                    </div>
                </div>
            </div>
            </div>
            <!-- Fin Div de modal-->
                <!-- footer content -->
<?php
include "../Vistas/footer.php";
?>
                <!-- /footer content -->
            </div>
        </div>

        <!-- jQuery -->
        <script src="../vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="../vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="../vendors/nprogress/nprogress.js"></script>
        <!-- iCheck -->
        <script src="../vendors/iCheck/icheck.min.js"></script>
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

        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>
<script type="text/javascript">
    $('#miModal').modal('show');
</script>
    </body>
</html>
