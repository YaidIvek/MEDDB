<?php

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$rol = $_SESSION['rol'] ?? '';

?>

<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Menú Principal</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background: #6f42c1;
}

.card-menu{
    transition: 0.3s;
    border-radius: 15px;
}

.card-menu:hover{
    transform: scale(1.03);
    box-shadow: 0px 8px 20px #6f42c1);
}

.boton-menu{
    text-decoration: none;
    color: white;
}

</style>

</head>

<body>

<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-lg-10">

<div class="card shadow-lg border-0">

<div class="card-header bg-dark text-white text-center p-4">

<h1>Sistema Turismo Medico</h1>

<h4>
Bienvenido <?php echo $_SESSION['usuario']; ?>
</h4>

<p class="mb-0">
Rol: <strong><?php echo $rol; ?></strong>
</p>

</div>

<div class="card-body p-5">

<div class="row g-4">

<!-- PACIENTES -->
<div class="col-md-4">
<a href="Pacientes/index.php" class="boton-menu">
<div class="card bg-primary text-white card-menu">
<div class="card-body text-center">
<h4>Pacientes</h4>
</div>
</div>
</a>
</div>

<!-- RESERVACIONES -->
<div class="col-md-4">
<a href="Reservaciones/index.php" class="boton-menu">
<div class="card bg-success text-white card-menu">
<div class="card-body text-center">
<h4>Reservaciones</h4>
</div>
</div>
</a>
</div>

<!-- PAGOS -->
<div class="col-md-4">
<a href="Pagos/index.php" class="boton-menu">
<div class="card bg-warning text-dark card-menu">
<div class="card-body text-center">
<h4>Pagos</h4>
</div>
</div>
</a>
</div>

<?php if ($rol === 'admin') { ?>

<!-- CLINICAS -->
<div class="col-md-4">
<a href="Clinicas/index.php" class="boton-menu">
<div class="card bg-info text-white card-menu">
<div class="card-body text-center">
<h4>Clínicas</h4>
</div>
</div>
</a>
</div>

<!-- TRATAMIENTOS -->
<div class="col-md-4">
<a href="Tratamientos/index.php" class="boton-menu">
<div class="card bg-danger text-white card-menu">
<div class="card-body text-center">
<h4>Tratamientos</h4>
</div>
</div>
</a>
</div>

<!-- HOSPEDAJES -->
<div class="col-md-4">
<a href="Hospedajes/index.php" class="boton-menu">
<div class="card bg-secondary text-white card-menu">
<div class="card-body text-center">
<h4>Hospedajes</h4>
</div>
</div>
</a>
</div>

<!-- REPORTES -->
<div class="col-md-12">
<a href="Reportes/index.php" class="boton-menu">
<div class="card bg-dark text-white card-menu">
<div class="card-body text-center">
<h4>Reportes</h4>
</div>
</div>
</a>
</div>

<?php } ?>

</div>

<hr class="my-4">

<div class="text-center">

<a href="cerrar.php" class="btn btn-outline-danger btn-lg">
Cerrar Sesión
</a>

</div>

</div>
</div>

</div>
</div>
</div>

</body>
</html>