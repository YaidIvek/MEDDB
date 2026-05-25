<?php

include("../ConexiónConMedDB.php");

$sql = "

SELECT *

FROM Hospedajes

WHERE Activo = 0

";

$stmt = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Hospedajes Inactivos</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow-lg border-0">

<div class="card-header bg-danger text-white">

<h2 class="mb-0">
Hospedajes Inactivos
</h2>

</div>

<div class="card-body">

<div class="table-responsive">

<table class="table table-hover table-bordered align-middle">

<thead class="table-dark text-center">

<tr>

<th>ID</th>
<th>Hotel</th>
<th>Dirección</th>
<th>Habitación</th>
<th>Costo</th>
<th>Estado</th>
<th>Acción</th>

</tr>

</thead>

<tbody>

<?php while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>

<tr>

<td class="text-center">

<?php echo $fila['ID']; ?>

</td>

<td>

<?php echo $fila['Nombre_Hotel']; ?>

</td>

<td>

<?php echo $fila['Direccion']; ?>

</td>

<td>

<?php echo $fila['Tipo_Habitacion']; ?>

</td>

<td>

$<?php echo $fila['Costo_Noche']; ?>

</td>

<td class="text-center">

<span class="badge bg-danger">

Inactivo

</span>

</td>

<td class="text-center">

<a href="reactivar.php?id=<?php echo $fila['ID']; ?>"
class="btn btn-success btn-sm">

Reactivar

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

<div class="mt-3">

<a href="index.php"
class="btn btn-secondary">

Volver

</a>

</div>

</div>

</div>

</div>

</body>
</html>