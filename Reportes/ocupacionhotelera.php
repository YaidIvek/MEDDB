<?php

include("../ConexiónConMedDB.php");

$sql = "

SELECT Hospedajes.Nombre_Hotel,
       COUNT(*) AS TotalReservaciones

FROM Reservacion_Hospedaje

INNER JOIN Hospedajes
ON Reservacion_Hospedaje.ID_Hospedaje = Hospedajes.ID

GROUP BY Hospedajes.Nombre_Hotel

ORDER BY TotalReservaciones DESC

";

$stmt = $conn->query($sql);

$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>Reporte de Ocupación Hotelera</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow-lg">

        <div class="card-header bg-info text-white">

            <h2 class="mb-0">
                Reporte de Ocupación Hotelera
            </h2>

        </div>

        <div class="card-body">

            <?php if(count($datos) > 0){ ?>

                <table class="table table-bordered table-hover table-striped">

                    <thead class="table-dark">

                        <tr>

                            <th>
                                Hotel
                            </th>

                            <th>
                                Total Reservaciones
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php foreach($datos as $fila){ ?>

                        <tr>

                            <td>

                                <?php echo $fila['Nombre_Hotel']; ?>

                            </td>

                            <td>

                                <?php echo $fila['TotalReservaciones']; ?>

                            </td>

                        </tr>

                    <?php } ?>

                    </tbody>

                </table>

            <?php } else { ?>

                <div class="alert alert-warning">

                    No existen datos para mostrar.

                </div>

            <?php } ?>

            <a href="index.php"
            class="btn btn-secondary">

                Volver a Reportes

            </a>

        </div>

    </div>

</div>

</body>
</html>