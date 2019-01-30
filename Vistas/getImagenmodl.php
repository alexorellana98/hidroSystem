<?php 
include "../ProcesoSubir/conexion.php";

$id=$_REQUEST['id'];

$cons="SELECT imagen FROM equipos WHERE idequipo=$id";

$result=$mysqli->query($cons);

$html="";
if($result){
	while($fila = mysqli_fetch_array($result))
	{
		$imag=$fila['imagen'];
		 
		$html.='<img style="height: 270px; width: 300px;" border="4" align="" src="data:image/jpeg;base64,'.base64_encode($imag) .' "  alt="No existe imagen para este equipo"/>';
	 
}
}

	echo $html;

 ?>