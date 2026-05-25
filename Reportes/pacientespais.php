<?php

include("../ConexiónConMedDB.php");

$sql = "

SELECT Pais_Origen,
       COUNT(*) AS TotalPacientes

FROM Pacientes

GROUP BY Pais_Origen

";

$stmt = $conn->query($sql);

?>

<!DOCTYPE html>
<html>

<head>

<title>Reporte</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h2>
                Pacientes por País
            </h2>

        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead class="table-dark">

                    <tr>

                        <th>País</th>
                        <th>Total Pacientes</th>

                    </tr>

                </thead>

                <tbody>

                <?php while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>

                    <tr>

                        <td>

                            <?php echo $fila['Pais_Origen']; ?>

                        </td>

                        <td>

                            <?php echo $fila['TotalPacientes']; ?>

                        </td>

                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>