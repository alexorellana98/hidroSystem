<?php
  if(isset($_REQUEST["id"])){

        require "../../ProcesoSubir/conexioneq.php"; 

        $id=$_REQUEST["id"];

        $result = $conexion->query("SELECT * FROM respestaciones WHERE idresponsable='$id'");
        $result2 = mysqli_fetch_array($result);

        $foto1="data:image/*;base64,".base64_encode($result2["foto"]);
        
        $datos = array(
          0 => $result2["institucion"],
          1 => $result2["responsable"],
          2 => $result2["direccion"],
          3 => $result2["telefono1"],
          4 => $result2["telefono2"],
          5 => "<img id='quitar' src='".$foto1."'/>",
          
        );

        echo json_encode($datos);
        
}        
?>
 