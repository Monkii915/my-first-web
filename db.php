<?php
$host = 'localhost';
$db   = 'myBase';
$user = 'admin';
$pass = 'contraseña_incorrecta'; // contraseña incorrecta para probar
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error detectado, escribiendo log...<br>";
    $logFile = __DIR__ . '/db_errors.log';
    $errorMessage = "[" . date('Y-m-d H:i:s') . "] Error de conexión: " . $e->getMessage() . PHP_EOL;
    $result = file_put_contents($logFile, $errorMessage, FILE_APPEND);
    if ($result === false) {
        echo "Error: No se pudo escribir en el archivo de log.<br>";
    } else {
        echo "Log escrito correctamente.<br>";
    }
    die("No se pudo conectar a la base de datos. Revisa el archivo de log.");
}
?>

