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