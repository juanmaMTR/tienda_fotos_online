<?php
    session_start();
    if(isset($_SESSION['idCliente'])){
        header('Location: ../../index.php');
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="jtoscanoreyes.guadalupe@alumnado.fundacionloyola.net>">
        <link rel="stylesheet" href="../css/style.css">
        <title>Registro</title>
    </head>
    <body>
        <header>
            <h1>Tienda de Fotos Online</h1>
            <nav>
                <ul>
                    <li><a href="./src/views/v_registro.php">Registro Usuario</a></li>
                    <li>Inicio Sesión</li>
                    <li>Realizar Pedido</li>
                    <li>Consultar Pedido</li>
                </ul>
            </nav>
        </header>
        <main>
            <h2>Registro</h2>
            <form action="#" method="post">
                <label>NombreUsuario:</label>
                <input type="text" placeholder="NombreUsuario" name="nombreusuario">
                <label>Contraseña:</label>
                <input type="text" placeholder="Contraseña" name="password">
                <label>Repetir contraseña:</label>
                <input type="text" placeholder="Repetir contraseña" name="password2">
                <label>Dirección:</label>
                <input type="text" placeholder="Dirección" name="direccion">
                <input type="submit" value="Enviar" name="enviar">
            </form>
            <?php
                require_once __DIR__ . '/../controller/controlador.php';
                $controlador=new Controlador();
                if (isset($_POST)) {
                    $controlador->altaCliente();
                }
            ?>
        </main>
    </body>
</html>