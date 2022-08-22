<?php
$carpeta ="noticias/";

$archivos= $carpeta.basename($_FILES["archivo"]["name"]);
$guardado=$_FILES["archivo"]["tmp_name"];

$tipoarchivo =strtolower(pathinfo($archivos , PATHINFO_EXTENSION));

/*Validar que es una imagen*/

$size=getimagesize($_FILES["archivo"]["tmp_name"]); /*Nombre del archivo y tamaño del archivo*/


if($size != false){

    /*Validando el tamaño del archivo*/

    if($tipoarchivo == "jpg" || $tipoarchivo == "jpeg" || $tipoarchivo == "png"){
        if(move_uploaded_file($_FILES["archivo"]["tmp_name"],$archivos.'fondo.jpg')){

        }

    }
    else
    {
        echo "Solamente se admiten archivos de imagenes";
    }

}
else{
    echo 'El archivo debe de ser una imagen';
}
?>
