<?php

if(!isset($_SESSION["id"])){
    header('Location:Index.php');
}
/*Sirve para cerrar Sesión , siempre debe de tener un SessionStar antes de cerrarla*/
session_start();
if (session_destroy()) {

    header("Location:Index.php");
}
?>
