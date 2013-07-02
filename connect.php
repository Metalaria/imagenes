<?php
$host = 'localhost';
$usermysql = 'gonzalo';
$passmysql = '';

$con = new mysqli('localhost', 'root', '', 'prueba');

if ($con->connect_error) {
    die('Error de Conexión (' . $con->connect_errno . ') '
            . $con->connect_error);
}

if (mysqli_connect_error()) {
    die('Error de Conexión (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

echo 'Exito... ' . $con->host_info . "\n";

$con->close();

?>
