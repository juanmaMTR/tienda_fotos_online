<?php
/**
 * @Author Juan Manuel Toscano Reyes <jtoscanoreyes.guadalupe@alumnado.fundacionloyola.net>
 * Clase donde estarán los procesos de la aplicación
 */
class Modelo {
    public $conexion;
    function __construct(){
        require_once __DIR__. '/../php/conexion.php';
        $conexion=new Conexion();
        $this->conexion=$conexion->conexion();
    }
    function cierroSesion(){
        unset($_SESSION['idCliente']);
        session_destroy();
        echo('La sesión se ha cerrado correctamente');
        header("Refresh:2; url=../../index.php");
    }
    function iniciarSesion(){
        $stmt=$this->conexion->prepare("SELECT idCliente,nombre FROM cliente WHERE nombre=? AND password=?;");
        $stmt->bind_param("ss",$_POST['nombreusuario'],$_POST['password']);
        $stmt->execute();
        $resultado=$stmt->get_result();
        while($fila=$resultado->fetch_assoc()){
            $_SESSION['idCliente']=$fila['idCliente'];
            echo ("Se ha iniciado sesión con el usuario ". $fila['nombre']);
        }
        
    }
    function consultar($sql){
        return $this->conexion->query($sql);
    }
    function alta(){
        $nombre=$_POST['nombreusuario'];
        $password=$_POST['password'];
        $direccion=$_POST['direccion'];
        $sql="INSERT INTO cliente (nombre,password,direccion) VALUES ('$nombre','$password','$direccion');";
        if($this->consultar($sql)){
            echo('Consulta realizada');
        }else{
            echo('La consulta no se realizó correctamente');
        }
    }
}
?>