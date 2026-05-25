<?php

include("../ConexiónConMedDB.php");

$sql = "

SELECT *

FROM Clinicas

WHERE Activo = 1

";

$stmt = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>Clínicas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow-lg border-0">

        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">

            <h2 class="mb-0">
                Lista de Clínicas
            </h2>

        </div>

        <div class="card-body">

            <div class="mb-3 d-flex gap-2">

                <a href="agregar.php"
                class="btn btn-success">

                    Nueva Clínica

                </a>

                <a href="inactivos.php"
                class="btn btn-danger">

                    Ver Inactivas

                </a>

            </div>

            <div class="table-responsive">

                <table class="table table-hover table-bordered align-middle">

                    <thead class="table-dark text-center">

                        <tr>

                            <th>ID</th>
                            <th>Número Clínica</th>
                            <th>Tipo Clínica</th>
                            <th>Dirección</th>
                            <th>Estado</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>

                        <tr>

                            <td class="text-center">

                                <?php echo $fila['ID']; ?>

                            </td>

                            <td>

                                <?php echo $fila['Num_Clinica']; ?>

                            </td>

                            <td>

                                <?php echo $fila['Tipo_Clinica']; ?>

                            </td>

                            <td>

                                <?php echo $fila['Direccion']; ?>

                            </td>

                            <td class="text-center">

                                <span class="badge bg-success">

                                    Activa

                                </span>

                            </td>

                            <td class="text-center">

                                <a href="editar.php?id=<?php echo $fila['ID']; ?>"
                                class="btn btn-warning btn-sm">

                                    Editar

                                </a>

                                <a href="desactivar.php?id=<?php echo $fila['ID']; ?>"
                                class="btn btn-danger btn-sm">

                                    Desactivar

                                </a>

                            </td>

                        </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                <a href="../MenuDb.php"
                class="btn btn-secondary">

                    Volver al Menú

                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>