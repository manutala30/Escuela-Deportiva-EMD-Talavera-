<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Instalación</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilo.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php

$servidor='localhost';
$usuario='root';
$password='';

$mysqli=new mysqli($servidor,$usuario,$password);
if (!isset($_POST["enviar"]))
{
    echo
    '
       <main class="row" id="contenedor">
        <article class="row">
            <div class="col-12 justify-content-center bienvenida"> 
 
                 <h1>Bienvenido a la página de Instalación</h1>                                
            </div>
        </article>
    </main>
                    <form  method="POST" class="text-center">
                        <label for="enviar">Pulse el boton para empezar la Instalación</label></br>
                        <input type="submit" class="btn btn-primary" name="enviar" value="Iniciar la instalación"/>
                    </form>
                ';
}
else
{
    $consulta1=
        "
        CREATE USER 'emdtalavera1'@'localhost' IDENTIFIED BY '12345';
        ";
    $resultado=mysqli_query($mysqli,$consulta1);


    $consulta2=
        "
        CREATE DATABASE IF NOT EXISTS escueladeportiva DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
        ";
    $resultad2=mysqli_query($mysqli,$consulta2);

    $consulta3=
        "
        GRANT ALL PRIVILEGES ON escueladeportiva.* TO 'emdtalavera1'@'localhost';
        ";
    $resultad3=mysqli_query($mysqli,$consulta3);
    $consulta=
        "
        USE escueladeportiva;


-- Estructura de tabla para la tabla `deporte`
--

CREATE TABLE `deporte` (
                           `idDeporte` tinyint(3) UNSIGNED NOT NULL,
                           `Nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `deporte`
--

INSERT INTO `deporte` (`idDeporte`, `Nombre`) VALUES
(1, 'Futbol'),
(2, 'Tenis'),
(3, 'Padel'),
(4, 'Zumba'),
(5, 'Gimnasia Artística'),
(6, 'Escuela de Verano'),
(7, 'Baloncesto'),
(8, 'Karate'),
(9, 'Piscina Municipal'),
(10, 'Pilates'),
(11, 'Futbol Sala'),
(12, 'Futbol 7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
                           `idHora` tinyint(3) UNSIGNED NOT NULL,
                           `HoraInicio` time NOT NULL,
                           `HoraFin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idHora`, `HoraInicio`, `HoraFin`) VALUES
(1, '11:00:00', '12:00:00'),
(2, '12:00:00', '13:00:00'),
(3, '13:00:00', '14:00:00'),
(4, '16:00:00', '17:00:00'),
(5, '17:00:00', '18:00:00'),
(6, '18:00:00', '19:00:00'),
(7, '19:00:00', '20:00:00'),
(8, '20:00:00', '21:00:00'),
(9, '21:00:00', '22:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
                            `idNoticia` smallint(5) UNSIGNED NOT NULL,
                            `idDeporte` tinyint(3) UNSIGNED NOT NULL,
                            `Titulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
                            `Desarrollo` varchar(10000) COLLATE utf8_spanish_ci NOT NULL,
                            `Imagen` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`idNoticia`, `idDeporte`, `Titulo`, `Desarrollo`, `Imagen`) VALUES
(1, 1, 'Bienvenido al Proyecto Miguel ', 'Hola miguel', 'defecto.png'),
(2, 2, 'Bienvenido al Proyecto Ernesto', 'Hola Ernesto', 'defecto.png'),
(3, 2, 'Bienvenido al Proyecto Paco', 'Hola Paco', 'defecto.png'),
(4, 1, 'Bienvenido al Proyecto Miguel ', 'Hola miguel', 'defecto.png'),
(5, 2, 'Bienvenido al Proyecto Ernesto', 'Hola Ernesto', 'defecto.png'),
(6, 1, 'Bienvenido al Proyecto Paco ', 'Hola miguel', 'defecto.png');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pistas`
--

CREATE TABLE `pistas` (
                          `idPista` tinyint(3) UNSIGNED NOT NULL,
                          `Nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
                          `idDeporte` tinyint(3) UNSIGNED NOT NULL,
                          `PrecioDia` decimal(10,2) NOT NULL,
                          `PrecioNoche` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pistas`
--

INSERT INTO `pistas` (`idPista`, `Nombre`, `idDeporte`, `PrecioDia`, `PrecioNoche`) VALUES
(1, 'Campo de Hierba', 1, '15.00', '25.00'),
(2, 'Campo de Tierra', 1, '10.00', '15.00'),
(3, 'Pista 1', 7, '15.00', '20.00'),
(4, 'Pista 2', 7, '10.00', '20.00'),
(5, 'Pista 3', 7, '10.00', '20.00'),
(7, 'Pista Interior', 11, '10.00', '20.00'),
(8, 'Pista Exterior', 11, '10.00', '20.00'),
(9, 'Pista Tenis 1', 2, '3.00', '5.00'),
(10, 'Pista Tenis 2', 2, '3.00', '5.00'),
(11, 'Pista Padel 1', 3, '3.00', '5.00'),
(12, 'Pista Padel 2', 3, '3.00', '5.00'),
(13, 'Campo de Albero', 12, '8.00', '12.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
                            `idReservas` int(10) UNSIGNED NOT NULL,
                            `idUsuario` smallint(5) UNSIGNED NOT NULL,
                            `idDeporte` tinyint(3) UNSIGNED NOT NULL,
                            `idPista` tinyint(3) UNSIGNED NOT NULL,
                            `Fecha` date NOT NULL,
                            `idHora` tinyint(3) UNSIGNED DEFAULT NULL,
                            `Nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reservas`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
                            `idUsuario` smallint(5) UNSIGNED NOT NULL,
                            `Nombre` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                            `Apellidos` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                            `NombreUsuario` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL unique,
                            `Password` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                            `Correo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL unique,
                            `Preguntaseg` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                            `Respuesta` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                            `Tipo` char(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `deporte`
--
ALTER TABLE `deporte`
    ADD PRIMARY KEY (`idDeporte`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
    ADD PRIMARY KEY (`idHora`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
    ADD PRIMARY KEY (`idNoticia`),
    ADD KEY `fk_deporte` (`idDeporte`);

--
-- Indices de la tabla `pistas`
--
ALTER TABLE `pistas`
    ADD PRIMARY KEY (`idPista`),
    ADD KEY `fk_deporte3` (`idDeporte`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
    ADD PRIMARY KEY (`idReservas`),
    ADD UNIQUE KEY `unique_index` (`idHora`,`Fecha`,`idPista`),
    ADD KEY `fk_deporte2` (`idDeporte`),
    ADD KEY `fk_pista` (`idPista`),
    ADD KEY `fk_Usuario` (`idUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
    ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `deporte`
--
ALTER TABLE `deporte`
    MODIFY `idDeporte` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
    MODIFY `idHora` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
    MODIFY `idNoticia` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `pistas`
--
ALTER TABLE `pistas`
    MODIFY `idPista` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
    MODIFY `idReservas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
    MODIFY `idUsuario` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
    ADD CONSTRAINT `fk_deporte` FOREIGN KEY (`idDeporte`) REFERENCES `deporte` (`idDeporte`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pistas`
--
ALTER TABLE `pistas`
    ADD CONSTRAINT `fk_deporte3` FOREIGN KEY (`idDeporte`) REFERENCES `deporte` (`idDeporte`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
    ADD CONSTRAINT `fk_HORA1` FOREIGN KEY (`idHora`) REFERENCES `horario` (`idHora`) ON DELETE CASCADE,
    ADD CONSTRAINT `fk_Usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE,
    ADD CONSTRAINT `fk_deporte2` FOREIGN KEY (`idDeporte`) REFERENCES `deporte` (`idDeporte`) ON DELETE CASCADE,
    ADD CONSTRAINT `fk_pista` FOREIGN KEY (`idPista`) REFERENCES `pistas` (`idPista`) ON DELETE CASCADE;
COMMIT;
    ";
    $resultado=mysqli_multi_query($mysqli,$consulta);
    $mysqli->close();
    header("Location:AnadirAdministrador.php");
}
?>
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
</html>
