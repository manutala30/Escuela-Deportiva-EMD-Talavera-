<?php
include 'conexion.php';
class clasesql{
    public $mysqli;
    public $resultado;
    /*Esta funcion es para conectar con la base de datos*/
    function __construct()
    {
    $this->mysqli= new mysqli(servidor,usuario,password,basedatos);
    }
    /*Esta es para realizar la consulta que deseas hacer.*/
    function realizarConsultas($sql){
    $this->resultado=$this->mysqli->query($sql);
    }
    /*Devuelve las filas de la consulta realizada*/
    function comprobarSelect(){
    return $this->resultado->num_rows;
    }
    /*
    Devuelve el numero de filas de la consulta realizada
    devuelve 1 o mas cuando hay filas afectadas
    0 cuando no hay filas-1 cuando hay un error
    */
    function comprobar(){
    return $this->mysqli->affected_rows;
    }
    /*
    Devuelve el numero de filas de la consulta realizada
    devuelve 1 o mas cuando hay filas afectadas
    0 cuando no hay filas-1 cuando hay un error
    */
    function extraerFilas(){
    return $this->resultado->fetch_array();
    }
    /*Cierra a sesion de la conexion con la base de datos*/
    function cerrarConexion(){
    $this->mysqli->close();
    }
    /*Devuelve el valor del Id de la fila afectada*/
    function sacarId()
    {
        return $this->mysqli->insert_id;
    }
    function numeroerror(){
        return $this->mysqli->errno;
    }

    function preparar($consulta){
        return $this->mysqli->prepare($consulta);
    }

//Función de inicio de sesión
    function iniciosesion($correo, $password){
        $consulta = "SELECT * FROM usuarios WHERE Correo=? or NombreUsuario=?;";
        $consulta2 = $this->mysqli->prepare($consulta);
        $consulta2->bind_param("ss",$_POST["correo"],$_POST["correo"]);
        $consulta2->execute();
        $resultado=$consulta2->get_result();
        if($resultado->num_rows>0){
            $fila = $resultado->fetch_array();
            if(password_verify($password,$fila["Password"])){
                $_SESSION["tipo"]= $fila["Tipo"];
                $_SESSION["nombre"]=$fila["Nombre"];
                $_SESSION["id"]=$fila["idUsuario"];
                return true;
            }
            else
            {
                echo '
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
             Swal.fire({

            icon:"error",
            text:"Usuario o contraseña mal introducido",
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            stopKeydownPropagation:false,
            backdrop:true,
             confirmButtonColor: "red",
             }).then((result) => {
            if (result.isConfirmed) {
                window.top.location="iniciodesesion.php";
            }
        })
          </script>
            
            ';
                return false;

            }

        }else{
            echo '
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
             Swal.fire({

            icon:"error",
            text:"Usuario o contraseña mal introducido",
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            stopKeydownPropagation:false,
            backdrop:true,
             confirmButtonColor: "red",
             }).then((result) => {
            if (result.isConfirmed) {
                window.top.location="iniciodesesion.php";
            }
        })
          </script>
            
            ';
            return false;
        }
//
    }

    function verificar($password, $hash)
    {
        return password_verify("$password", $hash);
    }
}
?>