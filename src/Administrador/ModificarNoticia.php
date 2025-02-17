<?php
session_start();
$id=$_GET["x"];

require_once 'MetodosManuelAmador.php';
$objconexion =new clasesql();
if(isset($_SESSION["id"])) {
    echo '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Emd Talavera - Reserva Futbol 11</title>
    <link rel="stylesheet" href="estilo.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="shortcut icon" href="../imagenes/emdtalavera.png" type="image/ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<script src="https://www.paypal.com/sdk/js?client-id=AWq54ekg789x4a8Q0GM595KvDVGBfFfRUfLtnSlr4t1bC_KrVZqrzGahK7jBTe-jQPzp7Ed3Tu97LpTY&currency=EUR"></script>
<div id="titulo">
    <h1>Escuela Municipal de Deportes Talavera la Real</h1>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="MenuAdministrador.php">
        <img src="../imagenes/emdtalavera.png" width="30" height="auto" margin-left="10px" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            </li>
            <li class="nav-item ">
                <a class="nav-link " href="ReservasAdm.php" >
                    Ver Reservas
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " href="VerUsuarios.php" >
                    Ver Usuarios
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" class="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Noticias
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="Noticias.php">Añadir Noticias</a>
                    <a class="dropdown-item" href="GestionNoticias.php">Gestión Noticias</a>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link " href="../CerrarSesion.php" >
                    Cerrar Sesión
                </a>
            </li>
            <li class="nav-item ">
                <h2>Menu de Administrador</h2>
            </li>
        </ul>
    </div>
</nav>

';
    /*Consulta para sacar los datos de la noticia selecionasa en el apartado anterior anterior*/
    $consulta = "SELECT * FROM Noticias n INNER join deporte d on d.idDeporte=n.idDeporte WHERE idNoticia= $id";
    $objconexion->realizarConsultas($consulta);
    if ($objconexion->comprobarSelect() > 0) {
        /*Extraemos los datos de la consulta realizada*/
        $fila = $objconexion->extraerFilas();
        $nombre = $fila["Nombre"];
        $iddd = $fila["idDeporte"];
        echo '
         <form method="post" class="text-center">
           <p><h2>Modificación de la Noticia</h2></p>
              <label for="titulo"><h4>Titulo</h4></label>
              <input  class="form-control input-lg text-center" type="text" name="titulo" value="' . $fila["Titulo"] . '" placeorder="' . $fila["Titulo"] . '"  ><br>
              <label for="desarrrollo"><h4>Desarrollo</h4></label>
              <input class="form-control input-lg text-center" name="desarrollo" type="text name="desarrollo" value="' . $fila["Desarrollo"] . '" placeorder="' . $fila["Desarrollo"] . '"><br>
 
              ';
        /*Consultamos todos los deporte para que el administrador pueda selecionaros todos*/
        $consulta = "SELECT * FROM `deporte`";
        $objconexion->realizarConsultas($consulta);
        if ($objconexion->comprobarSelect() > 0) {
            echo '<label for="titulo"><h4>Deporte</h4></label>
                        <select  class="form-control input-lg text-center" name="deporte">
                        <option value="' . $iddd . '">' . $nombre . '</option>
                            ';
            while ($fila = $objconexion->extraerFilas()) {
                $idDepor = $fila["idDeporte"];
                $nom = $fila["Nombre"];
                echo '<option value="' . $idDepor . '">' . $nom . '</option>';
            }
        }
        echo '  </select><br> 
             
             <input type="submit" value="Modificar Noticia" class="btn btn-primary btn-block" name="enviar" id="submit">
         </form> 
          
    ';
        /*Consulta para modificar la noticia seleccionada*/
        if (isset($_POST["enviar"])) {
            $consulta = "UPDATE `Noticias` SET idDeporte='" . $_POST["deporte"] . "',Titulo='" . $_POST["titulo"] . "',Desarrollo='" . $_POST["desarrollo"] . "' WHERE idNoticia=$id";
            $objconexion->realizarConsultas($consulta);
            if ($objconexion->comprobar() > 0) {
                echo '
            <script>
             Swal.fire({

            icon:"success",
            text:"Noticia Modificada con éxito",
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            stopKeydownPropagation:false,
            backdrop:true,
             confirmButtonColor: "Green",
             }).then((result) => {
            if (result.isConfirmed) {
                window.top.location="GestionNoticias.php";
            }
        })
          </script>';
            } else {
                echo '
            <script>
             Swal.fire({

            icon:"error",
            text:"Noticia no  Modificada con éxito",
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            stopKeydownPropagation:false,
            backdrop:true,
             confirmButtonColor: "red",
             }).then((result) => {
            if (result.isConfirmed) {
                window.top.location="GestionNoticias.php";
            }
        })
          </script>';
            }
        }
    }
}
else
{
    header('Location:error404.html');
}
?>
</body>
</html>
