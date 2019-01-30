<?php
//Archivo de conexión a la base de datos
include "../ProcesoSubir/conexion.php";
	
//Creamos las variables necesarias
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];



//Comprobamos que los inputs no estén vacíos, y si lo están, mandamos el mensaje correspondiente
if(empty($titulo)) {
	die( 'Es necesario establecer un título' );
} elseif(empty($descripcion)) {
	die( 'Es necesario establecer una descripción' );
	//"Error 4" en los array de $_FILES significa que ningún archivo fue subido o incluido en el input
	//Más info en http://php.net/manual/es/features.file-upload.errors.php
} elseif($_FILES['imagen']['error'] === 4) {
	die( 'Es necesario establecer una imagen' );
	//Si los inputs están seteados y el archivo no tiene errores, se procede
} else if(isset($descripcion) AND isset($titulo) AND $_FILES['imagen']['error'] === 0 ) {

	//Convertimos la información de la imagen en binario para insertarla en la BBDD
	$imagenBinaria = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

			$consulta = "INSERT INTO equipos (nombre, imagen) VALUES ('$titulo', '$imagenBinaria')";
			$result=$mysqli->query($consulta);
			//Hacemos la inserción, y si es correcta, se procede
			if($result) {
				//Reiniciamos los inputs
				echo '<script>
						$("#enviarimagenes input").each(function(index) {
							$(this).val("");
						});
						</script>';
			} else {
				//Si hay algún error con la inserción, se muestra un mensaje
				die( "Parece que ha habido un error. Recargue la página e inténtelo nuevamente." );
			};

		
};//Fin condicional para saber si todos los campos necesarios están completos
?>