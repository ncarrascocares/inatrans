<?php
// Script seguro para desactivar todos los usuarios existentes y dejar solo una cuenta administrador
// Uso: php scripts/reset_users.php

include_once __DIR__ . '/../modelo/Conexion.php';

// Credenciales por defecto vienen de modelo/Conexion.php
$db = new Conexion();
$pdo = $db->pdo;

try {
    // Marcar todos los usuarios como inactivos (Status_us = 0)
    $stmt = $pdo->prepare("UPDATE usuario SET Status_us = 0");
    $stmt->execute();

    // Cuenta administrador por defecto
    $admin_email = 'admin@inatrans.local';
    $admin_pass_plain = 'Admin123!'; // Cambiar a gusto tras ejecución
    $admin_name = 'Administrador';
    $admin_last = 'Sistema';
    $admin_cargo = 'Admin';
    $admin_sucursal = 1;
    $admin_tipo = 1; // administrador

    $admin_hash = password_hash($admin_pass_plain, PASSWORD_DEFAULT);

    // Verificar si ya existe usuario con ese correo
    $stmt = $pdo->prepare("SELECT id_usuario FROM usuario WHERE Correo_us = :email");
    $stmt->execute([':email' => $admin_email]);
    $row = $stmt->fetch();

    if ($row) {
        $id = isset($row->id_usuario) ? $row->id_usuario : $row['id_usuario'];
        $upd = $pdo->prepare("UPDATE usuario SET Nombre_us = :nombre, Apellido_us = :apellido, Cargo_us = :cargo, Sucursal_id = :sucursal, password_us = :pass, Status_us = 1, usuario_tipo = :tipo WHERE id_usuario = :id");
        $upd->execute([':nombre'=>$admin_name, ':apellido'=>$admin_last, ':cargo'=>$admin_cargo, ':sucursal'=>$admin_sucursal, ':pass'=>$admin_hash, ':tipo'=>$admin_tipo, ':id'=>$id]);
        echo "Actualizado usuario administrador (id={$id}).\n";
    } else {
        // Obtener nuevo id (si la tabla no es AUTO_INCREMENT)
        $res = $pdo->query("SELECT MAX(id_usuario) AS m FROM usuario");
        $r = $res->fetch();
        $max = null;
        if ($r) {
            if (is_object($r)) $max = $r->m;
            elseif (is_array($r)) $max = $r['m'];
        }
        $new_id = ($max !== null && $max !== '') ? $max + 1 : 1;
        $ins = $pdo->prepare("INSERT INTO usuario (id_usuario, Nombre_us, Apellido_us, Correo_us, Cargo_us, Sucursal_id, password_us, Status_us, usuario_tipo) VALUES (:id, :nombre, :apellido, :correo, :cargo, :sucursal, :pass, 1, :tipo)");
        $ins->execute([':id'=>$new_id, ':nombre'=>$admin_name, ':apellido'=>$admin_last, ':correo'=>$admin_email, ':cargo'=>$admin_cargo, ':sucursal'=>$admin_sucursal, ':pass'=>$admin_hash, ':tipo'=>$admin_tipo]);
        echo "Insertado usuario administrador (id={$new_id}).\n";
    }

    echo "Contraseña temporal del administrador: {$admin_pass_plain}\n";
    echo "Por seguridad, cambia la contraseña inmediatamente tras iniciar sesión.\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}

?>
