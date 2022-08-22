<?php
//Configuracion de la conexion a base de datos
require_once 'MetodosManuelAmador.php';
$objconexion =new clasesql();

//Consultamos si hay algun correo
$nombre= $_GET["nombre"];
$consulta = "SELECT * FROM `usuarios` WHERE Correo= '".$nombre."'";
$objconexion->realizarConsultas($consulta);
if ($objconexion->comprobarSelect()>0)
    echo "Bien";
else {
    //muestra los datos consultados
    echo "error";
}
?>
