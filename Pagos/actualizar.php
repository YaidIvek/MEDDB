<?php

include("../ConexiónConMedDB.php");

$ID = $_POST['ID'];

$ID_Reservacion = $_POST['ID_Reservacion'];

$Monto = $_POST['Monto'];

$Metodo_Pago = $_POST['Metodo_Pago'];

$Fecha_Pago = $_POST['Fecha_Pago'];

$sql = "

UPDATE Pagos

SET

Monto = :Monto,
Metodo_Pago = :Metodo_Pago,
Fecha_Pago = :Fecha_Pago

WHERE ID = :ID

";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':Monto', $Monto);
$stmt->bindParam(':Metodo_Pago', $Metodo_Pago);
$stmt->bindParam(':Fecha_Pago', $Fecha_Pago);
$stmt->bindParam(':ID', $ID);

if($stmt->execute()){

    $sqlCosto = "

    SELECT Tratamientos.Costo

    FROM Reservaciones

    INNER JOIN Tratamientos
    ON Reservaciones.ID_Tratamiento = Tratamientos.ID

    WHERE Reservaciones.ID = :ID_Reservacion

    ";

    $stmtCosto = $conn->prepare($sqlCosto);

    $stmtCosto->bindParam(':ID_Reservacion', $ID_Reservacion);

    $stmtCosto->execute();

    $tratamiento = $stmtCosto->fetch(PDO::FETCH_ASSOC);

    $Costo = $tratamiento['Costo'];

    if($Monto >= $Costo){

        $estado = "Pagado";

    }else{

        $estado = "Pendiente";

    }

    $sqlEstado = "

    UPDATE Reservaciones

    SET Estado = :estado

    WHERE ID = :ID_Reservacion

    ";

    $stmtEstado = $conn->prepare($sqlEstado);

    $stmtEstado->bindParam(':estado', $estado);

    $stmtEstado->bindParam(':ID_Reservacion', $ID_Reservacion);

    $stmtEstado->execute();

    ?>

    <!DOCTYPE html>
    <html lang="es">

    <head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>Pago Actualizado</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>

    <body class="bg-light">

    <div class="container mt-5">

    <div class="card shadow-lg border-0">

    <div class="card-header bg-success text-white">

    <h2 class="mb-0">
    Pago Actualizado
    </h2>

    </div>

    <div class="card-body">

    <div class="alert alert-success">

    El pago fue actualizado correctamente.

    </div>

    <a href="index.php"
    class="btn btn-primary">

    Volver a Pagos

    </a>

    </div>

    </div>

    </div>

    </body>
    </html>

    <?php

}else{

    echo "Error al actualizar";

}

?>