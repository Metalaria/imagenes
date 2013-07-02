<html>
<body>
<form action="" method="post" enctype="multipart/form-data">
	<label for="file">Sube una im&aacute;gen:</label>
	<input type="file" name="archivo" id="archivo" /> 
	<input type="submit" name="boton" value="Subir" />
</form>
<div class="resultado">
<?php
//include 'connect.php' ;
$con = new mysqli('localhost', 'root', '', 'prueba');
$path = 'fotos';
if(isset($_POST['boton'])){
	// Hacemos una condicion en la que solo permitiremos que se suban imagenes
	if ((($_FILES["archivo"]["type"] == "image/gif") || 
	($_FILES["archivo"]["type"] == "image/jpeg") || 
        ($_FILES["archivo"]["type"] == "image/png") ||
        ($_FILES["archivo"]["type"] == "image/bmp") ||
        ($_FILES["archivo"]["type"] == "image/tif") ||
        ($_FILES["archivo"]["type"] == "image/psd") ||
        ($_FILES["archivo"]["type"] == "image/eps") ||
        ($_FILES["archivo"]["type"] == "image/tiff") ||
        ($_FILES["archivo"]["type"] == "image/tga") ||
	($_FILES["archivo"]["type"] == "image/pjpeg")) && 
	($_FILES["archivo"]["size"] < 20000000000)) {
	
	//Si es que hubo un error en la subida, mostrarlo, de la variable $_FILES podemos extraer el valor de [error], que almacena un valor booleano (1 o 0).
	  if ($_FILES["archivo"]["error"] > 0) {
	    echo $_FILES["archivo"]["error"] . "<br />";
	  } else {
	  	// Si no hubo ningun error, hacemos otra condicion para asegurarnos que el archivo no sea repetido
	  	if (file_exists("$path/" . $_FILES["archivo"]["name"])) {
	  	  echo $_FILES["archivo"]["name"] . " ya existe. ";
	  	} else {
	  	 // Si no es un archivo repetido y no hubo ningun error, procedemos a subir a la carpeta /archivos, seguido de eso mostramos la imagen subida
	  	  move_uploaded_file($_FILES["archivo"]["tmp_name"],
	  	  "$path/" . $_FILES["archivo"]["name"]);
	  	  echo "Archivo Subido <br />";
                  $nombre_foto = $_FILES["archivo"]["name"];
                  $ruta = $path."/" . $_FILES["archivo"]["name"];
                  mysqli_query($con,"insert into imagenes (ruta, nombre) values ('$ruta','$nombre_foto' )");
                  //mysqli_query($con,"insert into imagenes (nombre) values ('$nombre_foto')")  ;
	  	  //echo "<img src='archivos/".$_FILES["archivo"]["name"]."' />";
	  	}
	  }
	} else {
		// Si el usuario intenta subir algo que no es una imagen o una imagen que pesa mas de 20 KB mostramos este mensaje
		echo "Archivo no permitido";
	}
}
/*$ruta = $path."/" . $_FILES["archivo"]["name"];
    
$query = "insert into 	imagenes (ruta) values 
    ('$ruta)" ; */

?>
</div>
</body>
</html>