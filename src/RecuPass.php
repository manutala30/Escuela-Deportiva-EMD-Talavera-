<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>EMD Talavera - Reservas</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="shortcut icon" href="imagenes/emdtalavera.png" type="image/ico"/>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <a class="navbar-brand" href="Index.php">
        <img src="imagenes/emdtalavera.png" width="30" height="auto" margin-left="10px" alt="logotalavera">
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
                /*Si no existe la sesion , mostrar esto*/
                if (!isset($_SESSION["id"]))
                {
                    echo '
                            <a class="nav-link " href="iniciodesesion.php" >
                            Inicio Sesión
                            </a>';
                }
                else
                {
                    /*Si existe la Sesión muestra estos datos*/
                    echo '
                                    <a class="nav-link dropdown-toggle" href="#" class="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Mi perfil
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="miperfil.php">Mi perfil</a>
                                        <a class="dropdown-item " href="CerrarSesion.php" > Cerrar Sesión</a>
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
/*Si se ha presionado el botón enviar*/
if(!isset($_POST["enviar"]) and !isset($_POST["enviar1"]) ) {
    echo '
        <div class="contenedor-form">
        <div class="formulario">
            aaa
        </div>
        <div class="formulario">
            <h2>Recuperación de Contraseña</h2>
            <form action="#" method="post">
                <input type="text" placeholder="Correo Electronico o Nombre Usuario" name="correo" required>
                <input type="submit" value="Recuperar Contraseña" name="enviar">
            </form>
        </div>
    </div> 
    ';
}
else
{
    /*Consultamos si el usaurio o el correo existe*/
    $cosulta= "SELECT * FROM usuarios where Correo='" . $_POST["correo"] . "' or NombreUsuario='" . $_POST["correo"] . "'";
    $objconexion->realizarConsultas($cosulta);
    if ($objconexion->comprobarSelect()>0){
        $fila = $objconexion->extraerFilas();
        if(!isset($_POST["enviar1"]) and !isset($_POST["enviar2"]) ) {
            echo
            '<div class="contenedor-form">
        <div class="formulario">
            aaa
        </div>
        <div class="formulario">
            <h2>Responde a la pregunta de Seguridad</h2>
            <form action="#" method="post">
                <input type="text" value="'.$fila["Correo"].'" name="correo" hidden required>
                <input type="text" value="'.$fila["Preguntaseg"].'" name="pregunta" readonly required>
                <input type="text" placeholder="Responde" name="respuesta" required>
                <i id="comp" hidden STYLE="color: red; font-size: 0.8em; margin: 0">Las contraseñas no coinciden</i>
                <input type="password" placeholder="Restablece tu contraseña" id="pass" minlength="4" maxlength="14" name="pass" onblur="Validacionpass()" required>
                <i id="comp1" hidden STYLE="color: red; font-size: 0.8em; margin: 0">Las contraseñas no coinciden</i>
                <input type="password" placeholder="Repite la contraseña" id="pass1" name="pass1" minlength="4" maxlength="14" onblur="Validacionpass()" required>
                <input type="submit" value="Reestablecer contraseña" name="enviar1">
            </form>
        </div>
        </div> 
        ';
        }
        else {
            if ($_POST["pass"] == $_POST["pass1"]) {
                /*Comprobamos si la contraseña coincide y la actualizamos con la otra introducida*/
                $contrasenahash = password_hash($_POST["pass"], PASSWORD_DEFAULT);
                $cosulta = "UPDATE `usuarios` SET `Password`='$contrasenahash' where Correo='" . $_POST["correo"] . "'
                 and Preguntaseg='" . $_POST["pregunta"] . "' and Respuesta ='" . $_POST["respuesta"] . "'";
                $objconexion->realizarConsultas($cosulta);
                if ($objconexion->comprobar() > 0) {
                    echo '
                <script>
             Swal.fire({

            icon:"success",
            text:"Contraseña modificada con exito",
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            stopKeydownPropagation:false,
             confirmButtonColor: "green",
             }).then((result) => {
            if (result.isConfirmed) {
                window.top.location="iniciodesesion.php";
            }
        })
          </script>
                ';
                } else {
                    echo '
                <script>
             Swal.fire({

            icon:"error",
            text:"Contraseña o pregunta mal respondida",
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            stopKeydownPropagation:false,
            confirmButtonColor: "red",
             }).then((result) => {
            if (result.isConfirmed) {
                window.top.location="iniciodesesion.php";
            }
        })
          </script>
                ';
                }
            }
            else
            {
                echo '
                <script>
             Swal.fire({

            icon:"error",
            text:"Las contraseñas no coinciden",
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            stopKeydownPropagation:false,
            confirmButtonColor: "red",
             }).then((result) => {
            if (result.isConfirmed) {
                window.top.location="RecuPass.php";
            }
        })
          </script>
                ';
            }
        }
    }
    else
    {
        echo'<script>
             Swal.fire({

            icon:"error",
            text:"El correo no existe",
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            stopKeydownPropagation:false,
            confirmButtonColor: "red",
             }).then((result) => {
            if (result.isConfirmed) {
                window.top.location="iniciodesesion.php";
            }
        })
          </script>';

    }
}

?>

<footer>
    <div id="contacto" class="text-left">
        <h3>Contacto</h3>
        <div class="red1"><a href="mailto:emdtalavera@gmail.com"><img src="imagenes/g_109859.ico"></a></div>
        <div class="red1"><a href="https://m.me/emd.talavera"><img src="imagenes/messengerf_108040.ico"></a></div>
        <div class="red1"><a href="https://api.whatsapp.com/send?phone=34676476850"><img src="imagenes/whatsapp_108042.ico"></a></div>
    </div>
    <div>
        <div id="miarma" class="text-center"><img src="imagenes/emdtalavera.png"></div>
    </div>
    <div id="redes" class="text-rigth">
        <h3>Nuestras redes sociales</h3>
        <div class="red1"><a href="https://www.facebook.com/emd.talavera"><img src="imagenes/facebook_108044.ico"></a></div>
        <div class="red1"><img src="imagenes/instagram_108043.ico"></div>
        <div class="red1"><a href="https://www.flickr.com/photos/124181947@N03/albums"><img src="imagenes/social_flickr_button_256_30645.ico"></a></div>
        <div class="red1"><a href="https://www.youtube.com/channel/UCoyMYv_dwmxKjb7l1kCa9Kw"><img src="imagenes/youtube_108041.ico"></a></div>
        <div class="red1"><a href="https://twitter.com/EMDTALAVERA"><img src="imagenes/1486051940-twitersocialnetworkbrandlogo_79084.ico"></a></div>
    </div>
</footer>
<div class="cookie-disclaimer">
    <div class="cookie-close accept-cookie "><i class="fa fa-times"></i></div>
    <div class="container">
        <p>Utilizamos cookies propias y de terceros para obtener datos estadísticos de la navegación de nuestros usuarios y mejorar nuestros servicios. Si acepta o continúa navegando, consideramos que acepta su uso. Puede cambiar la configuración u obtener más información.
            <a href="PoliticadeCokies.php">Política de Cookies</a>.</p>
        <button type="button" class="btn btn-success accept-cookie">Aceptar</button>
    </div>
    <script src="codigo.js"></script>
    <script>
        function Validacionpass() {
            clave1 = document.getElementById('pass').value;
            clave2 = document.getElementById('pass1').value;
            let p = document.getElementById('comp');
            let s = document.getElementById('comp1');
            if (clave2.length == 0){
                p.setAttribute("hidden",true);
                s.setAttribute("hidden",true)
            }

            if (clave1 == clave2 ){
                p.setAttribute("hidden",true);
                s.setAttribute("hidden",true)
            }
            else{

                p.removeAttribute("hidden");
                s.removeAttribute("hidden");
            }
        }
        function comprobarcorreoooo(){
            $.ajax({
                url:   'comprobarcorreo.php?nombre='+document.getElementById("email1").value,
                type:  'post',
                datatype: 'php',
                async: 'true',
                success:  function (datos) {
                    //document.getElementById("demo").innerHTML = datos;
                    if (datos == "Bien"){
                        let p = document.getElementById('comco');
                        p.removeAttribute("hidden");
                    }

                    else{
                        let p = document.getElementById('comco');
                        p.setAttribute("hidden",true);
                    }

                }
            });
        }
        function comprobarusaurio(){

            $.ajax({
                url:   'comprobarnombreusuario.php?nombre='+document.getElementById("nusuario").value,
                type:  'post',
                datatype: 'php',
                async: 'true',
                success:  function (datos) {
                    //document.getElementById("demo").innerHTML = datos;
                    if (datos == "Bien"){
                        let p = document.getElementById('nid');
                        p.removeAttribute("hidden");
                    }

                    else{
                        let p = document.getElementById('nid');
                        p.setAttribute("hidden",true);
                    }

                }
            });
        }

    </script>
</body>
</html>