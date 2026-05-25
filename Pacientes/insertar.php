<?php

include("../ConexiónConMedDB.php");

$Nombre = $_POST['Nombre'];

$Apellido_Paterno = $_POST['Apellido_Paterno'];

$Apellido_Materno = $_POST['Apellido_Materno'];

$Fecha_de_Nacimiento = $_POST['Fecha_de_Nacimiento'];

$Genero = $_POST['Genero'];

$Pais_Origen = $_POST['Pais_Origen'];

$sql = "

INSERT INTO Pacientes
(
    Nombre,
    Apellido_Paterno,
    Apellido_Materno,
    Fecha_de_Nacimiento,
    Genero,
    Pais_Origen
)

VALUES
(
    :Nombre,
    :Apellido_Paterno,
    :Apellido_Materno,
    :Fecha_de_Nacimiento,
    :Genero,
    :Pais_Origen
)

";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':Nombre', $Nombre);

$stmt->bindParam(':Apellido_Paterno', $Apellido_Paterno);

$stmt->bindParam(':Apellido_Materno', $Apellido_Materno);

$stmt->bindParam(':Fecha_de_Nacimiento', $Fecha_de_Nacimiento);

$stmt->bindParam(':Genero', $Genero);

$stmt->bindParam(':Pais_Origen', $Pais_Origen);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>Guardar Paciente</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <?php if($stmt->execute()){ ?>

                    <div class="card-header bg-success text-white text-center">

                        <h2>
                            Paciente Guardado
                        </h2>

                    </div>

                    <div class="card-body text-center">

                        <p class="fs-5">

                            El paciente se registró correctamente.

                        </p>

                        <div class="d-grid gap-2">

                            <a href="agregar.php"
                            class="btn btn-primary">

                                Agregar Otro Paciente

                            </a>

                            <a href="index.php"
                            class="btn btn-secondary">

                                Ver Pacientes

                            </a>

                            <a href="../MenuDb.php"
                            class="btn btn-dark">

                                Volver al Menú

                            </a>

                        </div>

                    </div>

                <?php }else{ ?>

                    <div class="card-header bg-danger text-white text-center">

                        <h2>
                            Error
                        </h2>

                    </div>

                    <div class="card-body text-center">

                        <p class="fs-5">

                            Ocurrió un error al guardar el paciente.

                        </p>

                        <a href="agregar.php"
                        class="btn btn-danger">

                            Intentar Nuevamente

                        </a>

                    </div>

                <?php } ?>

            </div>

        </div>

    </div>

</div>

</body>
</html>