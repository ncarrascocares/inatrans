<?php

$pdo = new PDO("mysql:dbname=db_inatrans;host=127.0.0.1","root","");

$sentencia = $pdo->prepare("SELECT * FROM eventos");
$sentencia->execute();

$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultado);

?>