<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{

    background: linear-gradient(135deg, #6f42c1, #6f42c1);

    height: 100vh;

    display: flex;

    justify-content: center;

    align-items: center;

}

.card-login{

    width: 400px;

    border-radius: 20px;

}

.logo{

    font-size: 60px;

}

</style>

</head>

<body>

<div class="card shadow-lg border-0 card-login">

<div class="card-body p-5">

<div class="text-center mb-4">

<div class="logo">
</div>

<h2 class="fw-bold">

Sistema Turismo Medico

</h2>

<p class="text-muted">

Inicio de Sesión

</p>

</div>

<form action="validar.php" method="POST">

<div class="mb-3">

<label class="form-label">

Usuario

</label>

<input type="text"
name="usuario"
class="form-control"
placeholder="Ingresa tu usuario"
required>

</div>

<div class="mb-4">

<label class="form-label">

Password

</label>

<input type="password"
name="contrasena"
class="form-control"
placeholder="Ingresa tu contraseña"
required>

</div>

<div class="d-grid">

<button type="submit"
class="btn btn-dark btn-lg">

Ingresar

</button>

</div>

</form>

<hr>

<div class="text-center text-muted">

<small>

Proyecto Final

</small>

</div>

</div>

</div>

</body>
</html>