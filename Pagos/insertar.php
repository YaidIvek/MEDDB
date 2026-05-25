<?php

include("../ConexiónConMedDB.php");

$ID_Reservacion = intval($_POST['ID_Reservacion']);

$Monto = str_replace(',', '.', $_POST['Monto']);

$Monto = number_format((float)$Monto, 2, '.', '');

$Metodo_Pago = $_POST['Metodo_Pago'];

$Fecha_Pago = $_POST['Fecha_Pago'];

$sqlCosto = "

SELECT Tratamientos.Costo

FROM Reservaciones

INNER JOIN Tratamientos
ON Reservaciones.ID_Tratamiento = Tratamientos.ID

WHERE Reservaciones.ID = ?

";

$stmtCosto = $conn->prepare($sqlCosto);

$stmtCosto->execute([$ID_Reservacion]);

$tratamiento = $stmtCosto->fetch(PDO::FETCH_ASSOC);

$costoTratamiento = floatval($tratamiento['Costo']);

$sql = "

INSERT INTO Pagos
(
    ID_Reservacion,
    Monto,
    Metodo_Pago,
    Fecha_Pago
)

VALUES
(
    ?, ?, ?, ?
)

";

$stmt = $conn->prepare($sql);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Resultado Pago</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h2>Resultado del Pago</h2>

        </div>

        <div class="card-body">

<?php

if($stmt->execute([
    $ID_Reservacion,
    $Monto,
    $Metodo_Pago,
    $Fecha_Pago
])){

    if($Monto >= $costoTratamiento){

        $sqlEstado = "

        UPDATE Reservaciones
        SET Estado = 'Pagado'

        WHERE ID = ?

        ";

        $stmtEstado = $conn->prepare($sqlEstado);

        $stmtEstado->execute([$ID_Reservacion]);

        ?>

        <div class="alert alert-success">

            <h4 class="alert-heading">
                Pago completo
            </h4>

            <p>
                La reservación ahora aparece como
                <strong>PAGADA</strong>.
            </p>

        </div>

        <?php

    }else{

        $faltante = $costoTratamiento - $Monto;

        ?>

        <div class="alert alert-warning">

            <h4 class="alert-heading">
                Pago insuficiente
            </h4>

            <p>
                Faltan
                <strong>
                    $<?php echo number_format($faltante, 2); ?>
                </strong>
                pesos.
            </p>

        </div>

        <?php

    }

}else{

    ?>

    <div class="alert alert-danger">

        <h4 class="alert-heading">
            Error al guardar el pago
        </h4>

    </div>

    <?php

}

?>

            <a href="index.php"
            class="btn btn-primary">

                Volver

            </a>

        </div>

    </div>

</div>

</body>
</html>