<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "nutri_student";

    // Conectar inicialmente al servidor MySQL
    $conn = new mysqli($host, $user, $password);

    if ($conn->connect_error) {
        die("Conexión fallida al servidor MySQL: " . $conn->connect_error);
    }

    // Crear base de datos si no existe
    $conn->query("CREATE DATABASE IF NOT EXISTS `$database` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;");

    // Seleccionar la base de datos
    $conn->select_db($database);
    $conn->set_charset("utf8mb4");

    // Verificar si las tablas existen; si no existen, crearlas automáticamente
    $checkTable = $conn->query("SHOW TABLES LIKE 'usuarios'");
    if ($checkTable && $checkTable->num_rows === 0) {
        $sqlPath = __DIR__ . '/../database.sql';
        if (file_exists($sqlPath)) {
            $sqlContent = file_get_contents($sqlPath);
            $conn->multi_query($sqlContent);
            while ($conn->next_result()) {;} // Consumir todos los resultados
        }
    }
?>