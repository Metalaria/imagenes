<?php
$con = new mysqli('localhost', 'root', '', 'prueba');
$busca="";
$busca=$_POST['busqueda'];
$dir='fotos';

if ($busca!=""){

        echo "<p><img src='$dir/$busca'></p>";
    }
?>
