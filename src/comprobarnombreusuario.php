<?php
//Configuracion de la conexion a base de datos
require_once 'MetodosManuelAmador.php';
$objconexion =new clasesql();

//Consulta para comprobar si un Nombre de Usuario esta repetido.//
$nombre= $_GET["nombre"];
$consulta = "SELECT * FROM `usuarios` WHERE NombreUsuario= '".$nombre."'";
$objconexion->realizarConsultas($consulta);
if ($objconexion->comprobarSelect()>0)
    echo "Bien";
else {
    //muestra los datos consultados
    echo "error";
}
?>
