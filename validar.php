<?php

session_start();
include("ConexiónConMedDB.php");

$usuario = $_POST['usuario'] ?? '';
$contrasena = $_POST['contrasena'] ?? '';

$sql = "
SELECT *
FROM Usuarios
WHERE Usuario = ?
AND Contrasena = ?
";

$stmt = $conn->prepare($sql);
$stmt->execute([$usuario, $contrasena]);

$datos = $stmt->fetch(PDO::FETCH_ASSOC);

if ($datos) {

    // Guardamos sesión
    $_SESSION['usuario'] = $datos['Usuario'];

    // 🔥 Opción 3: normalización estándar
    $_SESSION['rol'] = strtolower(trim($datos['Rol']));

    header("Location: MenuDb.php");
    exit();

} else {

    echo "
    <script>
        alert('Usuario o contraseña incorrectos');
        window.location='login.php';
    </script>
    ";

}

?>