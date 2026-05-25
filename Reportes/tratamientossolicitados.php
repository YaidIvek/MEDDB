<?php

include("../ConexiónConMedDB.php");

$sql = "

SELECT Tratamientos.Nombre_Tratamiento,
       COUNT(*) AS TotalSolicitudes

FROM Reservaciones

INNER JOIN Tratamientos
ON Reservaciones.ID_Tratamiento = Tratamientos.ID

GROUP BY Tratamientos.Nombre_Tratamiento

ORDER BY TotalSolicitudes DESC

";

$stmt = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>Tratamientos Más Solicitados</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h2>
                Tratamientos Más Solicitados
            </h2>

        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover table-striped">

                <thead class="table-dark">

                    <tr>

                        <th>
                            Tratamiento
                        </th>

                        <th>
                            Total Solicitudes
                        </th>

                    </tr>

                </thead>

                <tbody>

                <?php while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>

                    <tr>

                        <td>

                            <?php echo $fila['Nombre_Tratamiento']; ?>

                        </td>

                        <td>

                            <?php echo $fila['TotalSolicitudes']; ?>

                        </td>

                    </tr>

                <?php } ?>

                </tbody>

            </table>

            <br>

            <a href="index.php"
            class="btn btn-secondary">

                Volver a Reportes

            </a>

        </div>

    </div>

</div>

</body>
</html>