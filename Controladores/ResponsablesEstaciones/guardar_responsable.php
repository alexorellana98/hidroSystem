<?php
  if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
  {
      
      $msj="Error";
     
      function obtenerResultado(){
      require "../../ProcesoSubir/conexioneq.php"; 
      $result = 0;

      $institucion=$_POST["institucion"];
      $responsable=$_POST["responsable"];
      $direccion=$_POST["direccion"];
      $telefono1=$_POST["telefono1"];
      $telefono2=$_POST["telefono2"];
      if($telefono2=="____-____"){
        $telefono2=null;
      }

      $pic=null;
      if(($_FILES['file']['tmp_name'])!=""){
        //este es el archivo temporal
        $imagen_temporal = $_FILES['file']['tmp_name'];
        //este es eltipo de archivo
        $tipo = $_FILES['file']['type'];
        //leer el archivo temporal en binario
        $fp = fopen($imagen_temporal, 'r+b');
        $pic = fread($fp, filesize($imagen_temporal));
        fclose($fp);
        //escapar los caracteres
        $pic = mysqli_real_escape_string($conexion, $pic);
      }
        $consulta  = "INSERT INTO respestaciones(institucion, responsable, direccion, telefono1, telefono2, foto, activo) VALUES('$institucion','$responsable','$direccion','$telefono1','$telefono2','$pic','1')";
        $result =mysqli_query($conexion,$consulta);
      
    if ($result) {
      $msj = "Exito";
    } else {
      $msj = "Error";
    }
    return $msj;
  }
   
}else{
  throw new Exception("Error Processing Request", 1);   
}

  echo obtenerResultado();
?>