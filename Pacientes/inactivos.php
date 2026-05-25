<?php

include("../ConexiónConMedDB.php");

$sql = "

SELECT *

FROM Pacientes

WHERE Activo = 0

";

$stmt = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Pacientes Inactivos</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-danger text-white">

<h2>
Pacientes Inactivos
</h2>

</div>

<div class="card-body">

<table class="table table-bordered table-hover table-striped">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Nombre</th>
<th>Apellido</th>
<th>País</th>
<th>Acción</th>

</tr>

</thead>

<tbody>

<?php while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>

<tr>

<td><?php echo $fila['ID']; ?></td>

<td><?php echo $fila['Nombre']; ?></td>

<td><?php echo $fila['Apellido_Paterno']; ?></td>

<td><?php echo $fila['Pais_Origen']; ?></td>

<td>

<a href="reactivar.php?id=<?php echo $fila['ID']; ?>"
class="btn btn-success btn-sm">

Reactivar

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

<a href="index.php"
class="btn btn-secondary">

Volver

</a>

</div>

</div>

</div>

</body>
</html>