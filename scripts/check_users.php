<?php
// Consulta rápida para revisar usuarios y formatos de contraseña
include_once __DIR__ . '/../modelo/Conexion.php';
$db = new Conexion();
$pdo = $db->pdo;

try {
    echo "Listado de usuarios (id, correo, status, len, prefix):\n";
    $sql = "SELECT id_usuario, Correo_us, Status_us, CHAR_LENGTH(password_us) AS len, LEFT(password_us,4) AS prefix FROM usuario ORDER BY id_usuario;";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $r) {
        // PDO connection is configured to return lower-case keys
        $correo = $r['correo_us'] ?? '';
        $status = $r['status_us'] ?? '';
        echo sprintf("%3s | %-30s | status=%s | len=%s | pre=%s\n", $r['id_usuario'], $correo, $status, $r['len'], $r['prefix']);
    }

    echo "\nResumen hashed vs not_hashed:\n";
    $sql2 = "SELECT 
        SUM(CASE WHEN password_us LIKE '\$2%' OR password_us LIKE '\$argon2%' THEN 1 ELSE 0 END) AS hashed,
        SUM(CASE WHEN password_us NOT LIKE '\$2%' AND password_us NOT LIKE '\$argon2%' THEN 1 ELSE 0 END) AS not_hashed
        FROM usuario;";
    $stmt2 = $pdo->query($sql2);
    $res2 = $stmt2->fetch(PDO::FETCH_ASSOC);
    echo "Hashed: " . $res2['hashed'] . "\n";
    echo "Not hashed (probablemente texto plano): " . $res2['not_hashed'] . "\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}

?>