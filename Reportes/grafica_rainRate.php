<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Sistema Hidrometeorologico</title>
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
		
		
		
                <script type="text/javascript" src="../Highcharts-4.1.5/js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="../Highcharts-4.1.5/js/highcharts.js"></script>
		<script type="text/javascript" src="../Highcharts-4.1.5/js/exporting.js"></script>
                <script type="text/javascript" src="../Highcharts-4.1.5/js/themes/grid.js"></script>


		<?php 
                include_once '../ProcesoSubir/conexion.php';
                $fecha=$_GET['fe'];
                $ESta=$_GET['E'];
                $x=explode("-",$fecha);
                    $mes1=$x[0];
                     $a=$x[1];
                     
                     //validar**********
                     $validar= mysqli_query($mysqli,"SELECT
e.codiogestacion,
l.date,
avg(l.rainrate) as promrainrate
FROM estacionmet e
INNER JOIN lecturaestaciones l ON l.idestacion = e.id_estacion
where EXTRACT(MONTH FROM l.date)='$mes1'  AND EXTRACT(YEAR FROM l.date)='$a' AND e.id_estacion='$ESta'
GROUP BY e.codiogestacion, l.date
ORDER BY l.date");
                     if(mysqli_num_rows($validar)){
                     
                     
			$extrar= mysqli_query($mysqli,"SELECT
e.codiogestacion,
l.date,
avg(l.rainrate) as promrainrate
FROM estacionmet e
INNER JOIN lecturaestaciones l ON l.idestacion = e.id_estacion
where EXTRACT(MONTH FROM l.date)='$mes1'  AND EXTRACT(YEAR FROM l.date)='$a' AND e.id_estacion='$ESta'
GROUP BY e.codiogestacion, l.date
ORDER BY l.date");
                       
    //para sacar el codigo xq si ocupo el mismo query ya no carga la grafica
    $sacarCodigo= mysqli_query($mysqli,"SELECT
e.codiogestacion,
l.date,
avg(l.rainrate) as promrainrate
FROM estacionmet e
INNER JOIN lecturaestaciones l ON l.idestacion = e.id_estacion
where EXTRACT(MONTH FROM l.date)='$mes1'  AND EXTRACT(YEAR FROM l.date)='$a' AND e.id_estacion='$ESta'
GROUP BY e.codiogestacion, l.date
ORDER BY l.date");
                        while ($x=mysqli_fetch_array($sacarCodigo)){
                            $codigo=$x['codiogestacion'];
                        }
                        //*******************
                        
                         $fechas= mysqli_query($mysqli,"SELECT

l.date
FROM estacionmet e
INNER JOIN lecturaestaciones l ON l.idestacion = e.id_estacion
where EXTRACT(MONTH FROM l.date)='$mes1'  AND EXTRACT(YEAR FROM l.date)='$a' AND e.id_estacion='$ESta'
GROUP BY e.codiogestacion, l.date
ORDER BY l.date");
                      
			
		?>
		
		<script type="text/javascript">
		
			var chart;
			$(document).ready(function() {

				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container',
						defaultSeriesType: 'line'
					},
					title: {
						text: 'Sistema Hidrometeorologico'
					},
					subtitle: {
						text: 'Lluvia promedio correspondiente a <?php echo $fecha;?> de la estacion :<?php echo $codigo;?> '
					},
					xAxis: {
						// Le pasamos los datos que irán en el eje de las 'X' en JSON
						categories: [<?php while ($rows= mysqli_fetch_array($fechas)){?>
                                                '<?php echo $rows['date'];?>',<?php } ?>]
					},
					yAxis: {
						title: {
							text: 'Promedio de lluvia'
						}
					},
					tooltip: {
						enabled: true,
						formatter: function() {
							return '<b>'+ this.series.name +'</b><br/>'+
								this.x +': '+ this.y +' '+this.series.name;
						}
					},
					plotOptions: {
						line: {
							dataLabels: {
								enabled: true
							},
							enableMouseTracking: true
						}
					},
					// Le pasamos los datos en JSON
					series:[{
                                                name: 'Promedio',
                                                data:[<?php while ($row= mysqli_fetch_array($extrar)){?>
                                                <?php echo $row['promrainrate'];?>,<?php } ?>]
                                            }]
				});
				
				
			});
				
		</script>
                     <?php } else{ ?>
	</head>
	<body>
	<!-- MODAL-->
            <div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" id="MiModal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h4>¡No hay datos almacenados!</h4>
                            
                            <h4 class="modal-title" id="myModalLabel"></h4>
                        </div>
                        <div class="modal-body">
                                <div class="center-margin">
                                    <div class="row mb-12"  style="text-align:center">

                                        <img src="../Imagenes/datos.jpg" width="200" height="200" style="text-align:center">
                                    
                                </div>
                            </div>
                            <div class="input-group">
                                 <div class="row mb-12" style="float: right;margin-right: 20px; margin-top: 15px;">
                                   
                                     <a href="../Reportes/Vista_rainRayte.php" class="btn">
                                    <input type="submit" class="btn btn-warning" value="Cancelar" name="modGuardar">
                                      </a>
                                </div>
                                <br>
                               
                                </div>
                            
                                </div>   
                                <!--ERROR COMUN Y LO DEJARE AQUI PARA QUE VEAS
                                LA ETIQUETA </form> DETRO DE ELLA SIEMPRE TEIENE QUE ESTAR LOS BOTONES-->

                                
                           
                        </div>


                    </div>
                </div>
            </div>
            <!-- Fin Div de modal-->
		

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
     <script type="text/javascript">
    $('#MiModal').modal('show');
</script>
     <?php }?>
    <div id="container" style="width: 100%; height: 500px; margin: 0 auto"></div>
                <br><br>
                <center><a href="../Reportes/Vista_rainRayte.php">
                         <button type="submit" class="btn btn-success">Regresar</button>
                    </a></center>

		
	</body>
</html>