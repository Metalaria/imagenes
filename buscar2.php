<?php
// Configuracion 
$ruta = "fotos"; 
$campo = $ruta;
$tipos = array ("php"); 
$busqueda=$_POST['busqueda'] ;
$buscar = $busqueda; 
$filename = $buscar;
// Funciones 
function abrir($filename) 
{ 
$fd = @fopen ($filename, "a+"); 
$archivo = @fread ($fd, filesize ($filename)); 
@fclose ($fd); 
return $archivo; 
} 
/*$busqueda=$_POST['busqueda'] ;
$buscar = $busqueda; */
if($buscar){ 
// Incluimos todos los enlaces 
if($campo != "fotos"){ 
echo "<center>Resultados de la busqueda :</center><br>"; 
} 
// Recogemos la informacion de cada archivo 
$path = $ruta ; 
$dir = opendir($path); 
while ($elemento = readdir($dir)) 
{ 
$extensiones = explode(".",$elemento) ; 
$nombre = $extensiones[0] ; 
$nombre2 = $extensiones[1] ; 
// Especificamos dentro de donde busca 
if(in_array($nombre2, $tipos)){ 
$contenido = abrir($elemento); 
// Comprobamos que la palabra coincide 
if($campo != ""){ 
if(in_array($nombre2, $tipos) && $elemento!= "buscar2.php"){ 
echo "<li><a href=$elemento target=_blank>$nombre</a></li>"; 
} 
} 
} 
} 
closedir($dir); 
} 
?>
