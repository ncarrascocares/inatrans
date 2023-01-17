<?php
session_start();
// Validando que solo pueda ingresar un usuario administrador a este fichero
if ($_SESSION['usuario_tipo'] == 3) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Usuario</title>
    </head>

    <body>
        <h1>Hola Usuario</h1>
        <a href="../controlador/Logout.php">Cerrar sesión</a>
    </body>

    </html>
<?php
} else {
    header('Location: ../index.php');
}
?>