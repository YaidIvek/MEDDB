<?php

include("../ConexiónConMedDB.php");

$sql = "

SELECT Pagos.*,

       Reservaciones.Estado,

       Pacientes.Nombre,
       Pacientes.Apellido_Paterno,

       Tratamientos.Nombre_Tratamiento

FROM Pagos

INNER JOIN Reservaciones
ON Pagos.ID_Reservacion = Reservaciones.ID

INNER JOIN Pacientes
ON Reservaciones.ID_Paciente = Pacientes.ID

INNER JOIN Tratamientos
ON Reservaciones.ID_Tratamiento = Tratamientos.ID

ORDER BY Pagos.ID DESC

";

$stmt = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Pagos</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow-lg border-0">

<div class="card-header bg-success text-white d-flex justify-content-between align-items-center">

<h2 class="mb-0">
Lista de Pagos
</h2>

</div>

<div class="card-body">

<div class="mb-3 d-flex gap-2">

<a href="agregar.php"
class="btn btn-success">

Nuevo Pago

</a>

</div>

<div class="table-responsive">

<table class="table table-hover table-bordered align-middle">

<thead class="table-dark text-center">

<tr>

<th>ID</th>
<th>Paciente</th>
<th>Tratamiento</th>
<th>Monto</th>
<th>Método Pago</th>
<th>Fecha Pago</th>
<th>Estado</th>
<th>Acciones</th>

</tr>

</thead>

<tbody>

<?php while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>

<tr>

<td class="text-center">

<?php echo $fila['ID']; ?>

</td>

<td>

<?php

echo $fila['Nombre'] . " " .
     $fila['Apellido_Paterno'];

?>

</td>

<td>

<?php echo $fila['Nombre_Tratamiento']; ?>

</td>

<td>

$<?php echo number_format($fila['Monto'], 2); ?>

</td>

<td>

<?php echo $fila['Metodo_Pago']; ?>

</td>

<td>

<?php echo $fila['Fecha_Pago']; ?>

</td>

<td class="text-center">

<?php if($fila['Estado'] == 'Pagado'){ ?>

<span class="badge bg-success">

Pagado

</span>

<?php }else{ ?>

<span class="badge bg-warning text-dark">

Pendiente

</span>

<?php } ?>

</td>

<td class="text-center">

<a href="editar.php?id=<?php echo $fila['ID']; ?>"
class="btn btn-warning btn-sm">

Editar

</a>

<a href="eliminar.php?id=<?php echo $fila['ID']; ?>"
class="btn btn-danger btn-sm">

Eliminar

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

<div class="mt-3 d-flex gap-2">

<a href="../Reportes/reportepagos.php"
class="btn btn-dark">

Generar PDF

</a>

<a href="../MenuDb.php"
class="btn btn-secondary">

Volver al Menú

</a>

</div>

</div>

</div>

</div>

</body>
</html>