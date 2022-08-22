<?php
session_start();
require_once 'MetodosManuelAmador.php';
$objconexion =new clasesql();
if(isset($_SESSION["id"])) {
    echo '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ADM-EMDTALAVERA</title>
    <link rel="stylesheet" href="estilo.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!--Alertas -->
    <link rel="shortcut icon" href="../../imagenes/emdtalavera.png" type="image/ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
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
             <h4>Añade una Noticia</h4>
             <form method="post" enctype="multipart/form-data"">';
        /*Consulta para extraer todos los deportes disponibles*/
        $consulta = "SELECT * FROM `deporte`";
        $objconexion->realizarConsultas($consulta);
        if ($objconexion->comprobarSelect() > 0) {
            echo '<select class="form-select"  name="deporte">
                            <option selected>Selecciona el deporte</option>';
            while ($fila = $objconexion->extraerFilas()) {
                $id = $fila["idDeporte"];
                $nom = $fila["Nombre"];
                echo '<option value="' . $id . '">' . $nom . '</option>';
            }
        }
        echo '  </select><br> 
                  <div class="mb-3">
                  <label for="tituloo" class="form-label"><h4>Titulo</h4></label>
                  <input type="text"  name="titulo" class="form-control" id="tituloo" placeholder="Titulo Introducido..">
                </div>
                <div class="mb-3">
                  <label for="desarrrollo" class="form-label"><h4>Desarrollo de la Noticia</h4></label>
                  <textarea name="Desarrollo" class="form-control" id="desarrrollo" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlFile1"><h4>Selecione la Imagen</h4></label>
                  <input type="file" name="archivo" class="form-control-file" id="exampleFormControlFile1">
                </div> 
                <div class="modal-footer"> 
                  <input type="submit" value="Publicar" class="btn btn-primary btn-block" name="enviar" id="submit"> 
                </div>        
             </form>   
               
        ';

        if (isset($_POST["enviar"])) {
            /*Subida de Archivos, de donde se escogeran las imagenes*/
            $archivos = $_FILES["archivo"]["name"];
            $guardado = $_FILES["archivo"]["tmp_name"];
            if (move_uploaded_file($guardado, 'noticias/' . $archivos)) {
            }

            if (empty($_FILES["archivo"]["name"])) {
                $imagen = 'defecto.png';
                /*Si no lo guardas en una variable, se te guardara como cadena de caracteres*/
            } else {
                $imagen = "" . $_FILES["archivo"]["name"] . "";
            }

            /*Consulta para aádir la noticia con todos los datos rellenos*/
            $consulta = "INSERT INTO `noticias`( `idDeporte`, `Titulo`, `Desarrollo`, `Imagen`) 
                    VALUES ('" . $_POST["deporte"] . "','" . $_POST["titulo"] . "',
                    '" . $_POST["Desarrollo"] . "','" . $imagen . "')";
            $objconexion->realizarConsultas($consulta);

            if ($objconexion->comprobar() > 0) {
                echo '
                <script>
                 Swal.fire({
    
                icon:"success",
                text:"Noticia añadida con éxito",
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
                text:"Noticia no añadida con éxito",
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
    else
    {
        header('Location:error404.html');
    }

    ?>
</body>
</html>