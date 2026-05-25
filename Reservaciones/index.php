<?php

include("../ConexiónConMedDB.php");

$sql = "

SELECT Reservaciones.*,

       Pacientes.Nombre,
       Pacientes.Apellido_Paterno,

       Tratamientos.Nombre_Tratamiento

FROM Reservaciones

INNER JOIN Pacientes
ON Reservaciones.ID_Paciente = Pacientes.ID

INNER JOIN Tratamientos
ON Reservaciones.ID_Tratamiento = Tratamientos.ID

";

$stmt = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang='es'>

<head>

<meta charset='UTF-8'>

<title>Reservaciones</title>

<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>

</head>

<body class='bg-light'>

<div class='container mt-5'>

<div class='card shadow'>

<div class='card-header bg-primary text-white'>

<h2>
Lista de Reservaciones
</h2>

</div>

<div class='card-body'>

<a href='agregar.php'
class='btn btn-success mb-3'>

Nueva Reservación

</a>

<table class='table table-bordered table-hover table-striped'>

<thead class='table-dark'>

<tr>

<th>ID</th>
<th>Paciente</th>
<th>Tratamiento</th>
<th>Fecha</th>
<th>Estado</th>
<th>Acciones</th>

</tr>

</thead>

<tbody>

<?php while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>

<tr>

<td><?php echo $fila['ID']; ?></td>

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
<?php echo $fila['Fecha_Tratamiento']; ?>
</td>

<td>

<?php

if($fila['Estado'] == 'Pagado'){

echo "

<span class='badge bg-success'>
Pagado
</span>

";

}else{

echo "

<span class='badge bg-warning text-dark'>
Pendiente
</span>

";

}

?>

</td>

<td>

<a href='editar.php?id=<?php echo $fila['ID']; ?>'
class='btn btn-warning btn-sm'>

Editar

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

<a href='../MenuDb.php'
class='btn btn-secondary'>

Volver al Menú

</a>

</div>

</div>

</div>

</body>
</html>