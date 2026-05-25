<?php

include("../ConexiónConMedDB.php");

$id = $_GET['id'];

$sql = "

SELECT *

FROM Pagos

WHERE ID = :id

";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':id', $id);

$stmt->execute();

$pago = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Editar Pago</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow-lg border-0">

<div class="card-header bg-warning">

<h2 class="mb-0">
Editar Pago
</h2>

</div>

<div class="card-body">

<form action="actualizar.php" method="POST">

<input type="hidden"
name="ID"
value="<?php echo $pago['ID']; ?>">

<input type="hidden"
name="ID_Reservacion"
value="<?php echo $pago['ID_Reservacion']; ?>">

<div class="mb-3">

<label class="form-label">
Monto
</label>

<input type="number"
step="0.01"
name="Monto"

value="<?php echo $pago['Monto']; ?>"

class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">
Método de Pago
</label>

<input type="text"
name="Metodo_Pago"

value="<?php echo $pago['Metodo_Pago']; ?>"

class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">
Fecha de Pago
</label>

<input type="date"
name="Fecha_Pago"

value="<?php echo $pago['Fecha_Pago']; ?>"

class="form-control"
required>

</div>

<button type="submit"
class="btn btn-success">

Actualizar Pago

</button>

<a href="index.php"
class="btn btn-secondary">

Volver

</a>

</form>

</div>

</div>

</div>

</body>
</html>