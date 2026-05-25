<?php

$server = "DESKTOP-U1JTNO8\SQLEXPRESS";
$database = "MedDB";
$username = "sa";
$password = "1234";

try {

    $conn = new PDO(
        "sqlsrv:Server=$server;Database=$database",
        $username,
        $password
    );

    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );


} catch (PDOException $e) {

    die("Error en la conexión: " . $e->getMessage());

}

?>