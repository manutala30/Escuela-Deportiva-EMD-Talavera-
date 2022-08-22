<!--ManuelAmadorBueno-->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>Noticias-Emd</title>
    <link rel="shortcut icon" href="imagenes/emdtalavera.png" type="image/ico"/>
    <link rel="stylesheet" href="estilo.css">
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

    <div class="container ss">
        <?php
        require_once 'MetodosManuelAmador.php';
        $id=$_GET["x"];
        $objconexion = new clasesql();
        /*Consulta que ordena por idNoticia para refrescar dichas noticias y que aparezcan las ultimas*/
        $consulta = 'SELECT *,SUBSTRING(Desarrollo,1,600)as recorte FROM `noticias`
                            n INNER join deporte d on n.idDeporte=d.idDeporte
                            where n.idDeporte='.$id.' ORDER by idNoticia DESC';
        $objconexion->realizarConsultas($consulta);
        if ($objconexion->comprobarSelect()>0){

            echo '<h1 class="my-4 text-center">
                            Todas las noticias de tu Deporte Talaverano
                           </h1>';
            while ($fila = $objconexion->extraerFilas()) {
                $fila["Nombre"];
                $titulo=$fila["Titulo"];
                $Desarrollo=$fila["recorte"];
                $imagen=$fila["Imagen"];
                $ID=$fila["idNoticia"];
                echo '
                         <div class="row">
                            <div class="col-md-5">
                              <a href="#">
                                <img class="img-fluid rounded mb-3 mb-md-0" src="Administrador/noticias/'.$imagen.'" alt="'.$imagen.'"
                                 >
                              </a>
                            </div>
                            <div class="col-md-7">
                              <a href="NoticiaIndi.php?z='.$ID.'"><h3>' .$titulo.'</h3></a>
                              <p>'.$Desarrollo. '.... <a href="NoticiaIndi.php?z='.$ID.'">Ver mas</a></p>
                              </div>
                          </div>
                          <hr>
                         ';
            }
        }
        else
        {
            echo'
            <div class="text-center">
                <h2>No hay noticias del deporte selecionado actualmente</h2>
                <img  height="250em" width="15%" src="imagenes/emdtalavera.png">
                <h3>Sigue navegando por nuestra fantastica página web del deporte Talaverano</h3>
              </div>
              ';
        }
        ?>
    </div>
    <footer>
        <div id="contacto">
            <h3>Contacto</h3>
            <div class="red1"><a href="mailto:emdtalavera@gmail.com"><img src="imagenes/g_109859.ico"></a></div>
            <div class="red1"><a href="https://m.me/emd.talavera"><img src="imagenes/messengerf_108040.ico"></a></div>
            <div class="red1"><a href="https://api.whatsapp.com/send?phone=34676476850"><img src="imagenes/whatsapp_108042.ico"></a></div>
        </div>
        <div id="medio">
            <div id="miarma" class="text-center"><img src="imagenes/emdtalavera.png"></div>
        </div>
        <div id="redes" >
            <h3>Nuestras redes sociales</h3>
            <div class="red1"><a href="https://www.facebook.com/emd.talavera"><img src="imagenes/facebook_108044.ico"></a></div>
            <div class="red1"><img src="imagenes/instagram_108043.ico"></div>
            <div class="red1"><a href="https://www.flickr.com/photos/124181947@N03/albums"><img src="imagenes/social_flickr_button_256_30645.ico"></a></div>
            <div class="red1"><a href="https://www.youtube.com/channel/UCoyMYv_dwmxKjb7l1kCa9Kw"><img src="imagenes/youtube_108041.ico"></a></div>
            <div class="red1"><a href="https://twitter.com/EMDTALAVERA"><img src="imagenes/1486051940-twitersocialnetworkbrandlogo_79084.ico"></a></div>
        </div>
        <div class="text-center ss">
            <a href="http://www.talaveralareal.es/plantilla.php?enlace=aviso_legal">Avisos Legales</a>
            <a href="http://www.talaveralareal.es/plantilla.php?enlace=privacidad">Protección de datos</a>
            <a href="PoliticadeCokies.php">Política de Privacidad</a>
        </div>
    </footer>
    <!--Cokkies -->
    <div class="cookie-disclaimer col-12">
        <div class="cookie-close accept-cookie "><i class="fa fa-times"></i></div>
        <div class="container">
            <p>Utilizamos cookies propias y de terceros para obtener datos estadísticos de la navegación de nuestros usuarios y mejorar nuestros servicios. Si acepta o continúa navegando, consideramos que acepta su uso. Puede cambiar la configuración u obtener más información.
                <a href="PoliticadeCokies.php">Política de Cookies</a>.</p>
            <button type="button" class="btn btn-success accept-cookie">Aceptar</button>
        </div>
    </div>
    <!--    Boton de ayuda de subir la página-->
    <a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>

    <script type='text/javascript'>
        $(document).ready(function(){
            $(window).scroll(function(){
                if ($(this).scrollTop() > 0) {
                    $('#scroll').fadeIn();
                } else {
                    $('#scroll').fadeOut();
                }
            });
            $('#scroll').click(function(){
                $("html, body").animate({ scrollTop: 0 }, 0);
                return false;
            });
        });
    </script>
    <script src="codigo.js"></script>
</body>
</html>







