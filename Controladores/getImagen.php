<?php 
include "../ProcesoSubir/conexion.php";

$id=$_REQUEST['idequipo'];

$cons="SELECT imagen FROM equipos WHERE idequipo=$id";

$result=$mysqli->query($cons);

$html="";
if($result){
	while($fila = mysqli_fetch_array($result))
	{
		$imag=$fila['imagen'];
		 
		$html.='<img class="grande" border="4" align="" src="data:image/jpeg;base64,'.base64_encode($imag) .' "  alt="Card image cap"/>';
	 
}
}

	echo $html;

 ?>