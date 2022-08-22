<?php
session_start();
/*Evitamos acceso por url*/
if(!isset($_SESSION["id"])) {
    header('Location:Index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>Emd Talavera - Reserva Futbol 11</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="shortcut icon" href="../imagenes/emdtalavera.png" type="image/ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <a class="navbar-brand" href="Index.php">
        <img src="imagenes/emdtalavera.png" width="30" height="auto" margin-left="10px" alt="EmdTalavera">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!--Panel de navegación utilizado con la libreria de Bootstrap -->
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <!--Menu desplegable con diferentes opciones-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" class="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Fútbol
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="NoticiasDeporte.php?x=1">Futbol 11</a>
                    <a class="dropdown-item"  href="NoticiasDeporte.php?x=11">Futbol Sala</a>
                    <a class="dropdown-item"  href="NoticiasDeporte.php?x=12">Futbol 7</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="NoticiasDeporte.php?x=7">
                    Baloncesto
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="NoticiasDeporte.php?x=2">
                    Tenis
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="NoticiasDeporte.php?x=3">
                    Padel
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="NoticiasDeporte.php?x=10">
                    Pilates
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="NoticiasDeporte.php?x=5">
                    Gimnasia Artística
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="NoticiasDeporte.php?x=4">
                    Zumba
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="NoticiasDeporte.php?x=8">
                    Karate
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" class="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Otros
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="NoticiasDeporte.php?x=6">Escuela de Verano</a>
                    <a class="dropdown-item" href="NoticiasDeporte.php?x=8">Multideporte</a>
                    <a class="dropdown-item" href="NoticiasDeporte.php?x=9">Piscina Municipal</a>
                </div>
            </li>
            <li class="nav-item success">
                <a class="nav-link text-success bold" href="Reservas.php" class="navbarDropdownMenuLink" >
                    <strong>Reserva tu Pista</strong>
                </a>
            </li>

            <li class="nav-item ">
                <?php
                if (!isset($_SESSION["id"]))
                {
                    echo '
                        <a class="nav-link " href="iniciodesesion.php" >
                        Inicio Sesión
                        </a>';
                }
                else
                {

                    echo '
                                <a class="nav-link dropdown-toggle" href="#" class="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Mi perfil
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="NoticiasDeporte.php?x=7">Mi perfil</a>
                                    <a class="dropdown-item" href="NoticiasDeporte.php?x=7">Mis Reservas</a>
                                    <a class="nav-link " href="CerrarSesion.php" > Cerrar Sesión</a>
                                </div>
                        ';
                }
                ?>

            </li>
        </ul>
    </div>
</nav>
<?php
require_once 'MetodosManuelAmador.php';
$objconexion =new clasesql();
echo'
         <form method="post" class="text-center">
           <p><h3>¿Desea Eliminar El usuario?</h3></p>
              <input type="radio" name="check" value="si" >
              <label for="check">Si,eliminar el Usuario</label><br>
              <input type="radio"name="check" value="no">
              <label for="check">No eliminar el Usuario</label><br><br>
             <input type="submit" value="Confirmar" class="btn btn-primary btn-block" name="enviar" id="submit">
         </form><br><br>   
         <div class="text-center">
               
                <img  height="200em" width="15%" src="imagenes/emdtalavera.png" alt="EmdTalavera">
              </div>  
 ';
if(isset($_POST["enviar"])) {
    /*comprobamos la opcion selecionada*/
    if($_POST["check"]=='si')
    {
        /*Consulta para dar de baja al Usuario*/
        $consulta="DELETE FROM `usuarios` WHERE idUsuario='" .$_SESSION["id"]. "'";
        $objconexion->realizarConsultas($consulta);
        if ($objconexion->comprobar()>0)
        {
            echo'<script>
             Swal.fire({

            icon:"success",
            text:"Usuario eliminado con exito",
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            stopKeydownPropagation:false,
            confirmButtonColor: "red",
             }).then((result) => {
            if (result.isConfirmed) {
                window.top.location="CerrarSesion.php";
            }
        })
          </script>';
        }
    }
    if($_POST["check"]=='no')
    {
        {
            echo'<script>
             Swal.fire({

            icon:"error",
            text:"Usuario no eliminado",
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            stopKeydownPropagation:false,
            confirmButtonColor: "red",
             }).then((result) => {
            if (result.isConfirmed) {
                window.top.location="miperfil.php";
            }
        })
          </script>';
        }
    }
}

?>

</body>
</html>
