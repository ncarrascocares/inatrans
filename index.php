<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
if (!empty($_SESSION['usuario_tipo'])) {
    header('Location: /inatrans/vista/catalogo.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Mantenimiento || Inatrans</title>
</head>
<hgroup>
  <h1>Área de mantenimiento Inatrans</h1>
  <h3>By Nicolás Carrasco Cares</h3>
</hgroup>
<form action="controlador/LoginController.php" method="POST">
  <div class="group">
    <input type="email" name="txtEmail"><span class="highlight"></span><span class="bar"></span>
    <label>Correo</label>
  </div>
  <div class="group">
    <input type="password" name="txtPassword"><span class="highlight"></span><span class="bar"></span>
    <label>Password</label>
  </div>
  <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?? ''; ?>">
  <button type="submit" class="button buttonBlue">Logearse</button>
</form>
<!--
<footer><a href="http://www.polymer-project.org/" target="_blank"><img src="https://www.polymer-project.org/images/logos/p-logo.svg"></a>
  <p>You Gotta Love <a href="http://www.polymer-project.org/" target="_blank">Google</a></p>
</footer>
-->
</body>
</html>
