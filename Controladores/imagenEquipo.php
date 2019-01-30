                     <?php
                     include "../ProcesoSubir/conexioneq.php";
                      $consulta = "SELECT * FROM equipos ";
                      $resultado = $mysqli->query($consulta);
                       while ($datos = $resultado->fetch_assoc()) {
                     ?>
               
                   
                       <img src="data:image/jpg;base64,<?php echo base64_encode($datos['imagen']); ?>" />
                      
                    
                      <?php
                      };
                     ?>