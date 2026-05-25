<?php

include("../ConexiónConMedDB.php");

$sql = "

SELECT MONTH(Fecha_Pago) AS Mes,
       YEAR(Fecha_Pago) AS Año,
       SUM(Monto) AS TotalIngresos

FROM Pagos

GROUP BY YEAR(Fecha_Pago),
         MONTH(Fecha_Pago)

ORDER BY Año DESC,
         Mes DESC

";

$stmt = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>Ingresos Mensuales</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-success text-white">

            <h2>
                Reporte de Ingresos Mensuales
            </h2>

        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover table-striped">

                <thead class="table-dark">

                    <tr>

                        <th>
                            Mes
                        </th>

                        <th>
                            Año
                        </th>

                        <th>
                            Total Ingresos
                        </th>

                    </tr>

                </thead>

                <tbody>

                <?php while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>

                    <tr>

                        <td>

                            <?php echo $fila['Mes']; ?>

                        </td>

                        <td>

                            <?php echo $fila['Año']; ?>

                        </td>

                        <td>

                            $<?php echo number_format($fila['TotalIngresos'], 2); ?>

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