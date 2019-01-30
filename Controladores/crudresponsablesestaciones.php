<?php
  if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
  {
    if(isset($_POST['actualizar'])){
      $msj="Error";
      function obtenerResultado(){
        require "../ProcesoSubir/conexioneq.php"; 
        $result = 0;
        $result1 = 0;
        $result2 = 0;
        $result3 = 0;
        $datos=null;
        $id = $_POST['actualizar'];
        $institucion=$_POST["institucion"];
        $responsable=$_POST["responsable"];
        $direccion=$_POST["direccion"];
        $telefono1=$_POST["telefono1"];
        $telefono2=$_POST["telefono2"];
  
     $consulta = "SELECT * FROM respestaciones WHERE institucion='$institucion'";
     $result = $conexion->query($consulta);
      if ($result) {
        while ($fila = $result->fetch_object()) {
          $datos=$fila->institucion;
        }//fin while
      }
  
     if($datos==null){
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

        $consulta2  = "UPDATE respestaciones SET institucion='$institucion', responsable='$responsable', direccion='direccion', telefono1='$telefono1', telefono2='telefono2', foto='$pic' WHERE idresponsable="+$id;
        $result2 =mysqli_query($conexion,$consulta2);
      }else{
        $consulta2  = "UPDATE respestaciones SET institucion='$institucion', responsable='$responsable', direccion='direccion', telefono1='$telefono1', telefono2='telefono2' WHERE idresponsable="+$id;
        $result2 =mysqli_query($conexion,$consulta2);
      }
      
       
        
      }
      if ($result2) {
        $msj = "Exito";
      } else {
        $msj = "Error";
      }
      return $msj;
    }

    }else{
      
      $msj="Error";
     
      function obtenerResultado(){
      require "../ProcesoSubir/conexioneq.php"; 
      $result = 0;
      $result1 = 0;
      $result2 = 0;
      $result3 = 0;
      $datos=null;
      $institucion=$_POST["institucion"];
      $responsable=$_POST["responsable"];
      $direccion=$_POST["direccion"];
      $telefono1=$_POST["telefono1"];
      $telefono2=$_POST["telefono2"];
     // $foto=$_POST["foto"];
   
      

   $consulta = "SELECT * FROM respestaciones WHERE institucion='$institucion'";
   $result = $conexion->query($consulta);
    if ($result) {
      while ($fila = $result->fetch_object()) {
        $datos=$fila->institucion;
      }//fin while
    }

   if($datos==null){
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
     
      $consulta2  = "INSERT INTO respestaciones(institucion, responsable, direccion, telefono1, telefono2, foto, activo) VALUES('$institucion','$responsable','$direccion','$telefono1','$telefono2','$pic','1')";
      $result2 =mysqli_query($conexion,$consulta2);
    }
    if ($result2) {
      $msj = "Exito";
    } else {
      $msj = "Error";
    }
    return $msj;
  }
}
   
}else{
  throw new Exception("Error Processing Request", 1);   
}

  echo obtenerResultado();
?>