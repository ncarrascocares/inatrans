<?php
require_once __DIR__ . '/../modelo/Usuario.php';
session_start();

$correo = $argv[1] ?? 'admin@inatrans.local';
$pass = $argv[2] ?? 'Admin123!';

$u = new Usuario();
$u->Logearse($correo, $pass);

header('Content-Type: application/json');
echo json_encode([
    'input' => ['email' => $correo],
    'result' => $u->objetos ?? null,
]);
