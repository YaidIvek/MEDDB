<?php

$server   = "DESKTOP-U1JTNO8\SQLEXPRESS"; 
$dbname   = "ESCUELADB"; 
$username = "sa";        
$password = "1234";

try {
    $conn = new PDO("sqlsrv:Server=$server;Database=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("<p style='color: red;'>Error de conexión: " . $e->getMessage() . "</p>");
}

try {
    echo "<h2>Lista de Alumnos Registrados:</h2>";
    echo "<hr>"; 

    $sql = "SELECT * FROM alumnos";
    $stmt = $conn->query($sql);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<strong>ID:</strong> " . $row['ID'] . "<br>";
        echo "<strong>Nombre:</strong> " . $row['Nombre'] . "<br>";
        echo "<strong>Carrera:</strong> " . $row['Carrera'] . "<br>";
        echo "<hr>"; 
    }
} catch (PDOException $e) {
    echo "<p style='color: red;'>Error en la consulta: " . $e->getMessage() . "</p>";
}
?>