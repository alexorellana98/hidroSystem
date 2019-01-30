<?php
    include "../ProcesoSubir/conexioneq.php";

    $opcion=$_REQUEST["opcion"];
    $cambio=$_REQUEST["cambio"];
    $vis=$_REQUEST["vis"];
   // echo '<input type="text" name="esta" value="'.$cambio.'">';
    if($opcion==="cambioTipo"){
        ?>

        <option value="Visitante" selected>Visitante</option>
        <?php       
        $result=$conexion->query("SELECT vis.id_visitante, vis.nombre, vis.tipo from visitantes vis where vis.tipo = '".$cambio."' ");
        
        while($fila = $result->fetch_object()){
        ?>
            <option value="<?php echo $fila->id_visitante;?>"><?php echo $fila->nombre?></option>
            <?php
        }
    }
    if($opcion==="cambioFoto"){
        ?>
        <?php
        if($cambio === "Estaciones"){
            echo "<img  width='685' height='290' src='images/volcan.jpg'/>";
        }else{       
            $result  = $conexion->query("SELECT * from estacionmet est where est.id_estacion = '".$cambio."'  ");
            while($fila = $result->fetch_object()){
            ?>
                <img width="685" height="290" src="data:image/jpg;base64,<?php echo base64_encode($fila->foto); ?>"/>
                
            <?php
            }
        }
    }
    
    if($opcion==="cambioTipos"){

        $result=$conexion->query("SELECT * from visitantes where tipo = '".$cambio."' ");

        $cadena='<select class="form-control " id="visitantes" name="visitantes"  >';
        $cadena=$cadena.'"<option value="0" >Visitante</option>"';
        
            if ($result) {
                while($fila= $result->fetch_object()){
                    if($vis==$fila->id_visitante){
                        $cadena=$cadena."<option value='".$fila->id_visitante."' selected>".$fila->nombre."</option>";
                    }else{
                        $cadena=$cadena."<option value='".$fila->id_visitante."'>".$fila->nombre."</option>";
                    }
                }                                 
            } else {
            }
        echo $cadena."</select>";
        
         
    }

    
        
?>
