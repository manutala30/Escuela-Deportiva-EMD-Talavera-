<?php
session_start();
require_once 'MetodosManuelAmador.php';
$objconexion = new clasesql();
if(isset($_SESSION["id"])) {
    echo '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ADM-EMDTALAVERA</title>
    <link rel="stylesheet" href="estilo.css">
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
                <a class="nav-link " href="#" class="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
    /*Consulta para ver todos los usuarios de la página web*/
    $consulta = "SELECT * FROM `usuarios` WHERE Tipo='d'";
    $objconexion->realizarConsultas($consulta);
    if ($objconexion->comprobarSelect() > 0) {
        if (!isset($_POST["enviar"])) {
            echo '
            <!-- Formulario de busqueda de un usuario en concreto-->
            <form  method="POST">
            <h4>Busca a un usuario</h4>
             <div class="input-group mt-2">
                <input  id="nombre"  name="nombre" type="search" class="form-control rounded" placeholder="Busca al usuario por su Nombre y apellidos" aria-label="Search"
                aria-describedby="search-addon" required/>
                <input type="submit" class="btn btn-outline-primary" value="Buscar Usuario" name="enviar">
                </div>
            </form>
            <!-- Tabla registrando todos los usuarios registrados en la página-->
                <h1 class="text-center">Todos los usuarios de EMD Talavera</h1>
                <div class="container">
                    <div class="row">
                        <div class="col">
                        <table class="table table-hover table-bordered text-center">
                            <thead>
                                <tr class="table-success ">
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Correo</th>
                                    <th>Eliminar Usuario</th>
                                </tr>
                            </thead>
                            ';
            while ($fila = $objconexion->extraerFilas()) {
                echo '<tbody>
                                <tr>
                                    <td>' . $fila["Nombre"] . '</td>
                                    <td>' . $fila["Apellidos"] . '</td>
                                    <td>' . $fila["Correo"] . '</td>
                                    <td><a href="EliminarUsuario.php?x= ' . $fila["idUsuario"] . '"><img src="../imagenes/eliminar.png" alt="eliminar"></a></td>
                                </tr>		
                            </tbody>
                            ';
            }
            echo '</table>
                    </div>
		        </div>';
        } else {
//    Consulta que busca a el usuario introducido en el formulario de busqueda
            $consulta = "SELECT CONCAT(Nombre," . '" "' . ",Apellidos ) as nombres , Correo,idUsuario FROM `usuarios` WHERE CONCAT(Nombre," . '" "' . ",Apellidos )  LIKE '%" . $_POST["nombre"] . "%'";
            $objconexion->realizarConsultas($consulta);
            if ($objconexion->comprobarSelect() > 0) {
                echo '
                <h1>Usuarios relacionados con ' . $_POST["nombre"] . ' </h1>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr class="table-success">
                                            <th>Nombre y apellidos</th>
                                            <th>Correo</th>
                                            <th>Eliminar Usuario</th>
                                        </tr>
                                    </thead>
                                    ';
                while ($fila = $objconexion->extraerFilas()) {
                    echo '<tbody>
                                        <tr class="text-center">
                                            <td>' . $fila["nombres"] . '</td>
                                            <td>' . $fila["Correo"] . '</td>
                                            <td><a href="EliminarUsuario.php?x= ' . $fila["idUsuario"] . '"><img src="../imagenes/eliminar.png" alt="eliminar"></a></td>
                                        </tr>		
                                    </tbody>';
                }
                echo '</table>
                            </div>
                        </div>
                    </div>';
            } else {
//          Si no hay usuario o se ha confundido introduciendo el nombre le apaerce este mensaje
                echo '<h1>No se encontro ningun usuario con el nombre introducido </h1>
                    <a href="VerUsuarios.php">Volver a buscar</a>';
            }
        }
    } else {
        echo '<div class="text-center">
                <h2>No hay usuarios registrados en la página</h2>
                <img  height="200em" width="15%" src="../imagenes/emdtalavera.png">
              </div>
              ';
    }
}
else
{
    header('Location:error404.html');
}
?>
<script src="../codigo.js"></script>
</body>
</html>

