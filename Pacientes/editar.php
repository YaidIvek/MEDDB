<?php

include("../ConexiónConMedDB.php");

$id = $_GET['id'];

$sql = "SELECT * FROM Pacientes
        WHERE ID = :id";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':id', $id);

$stmt->execute();

$paciente = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Editar Paciente</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-warning text-dark">

            <h2 class="mb-0">
                Editar Paciente
            </h2>

        </div>

        <div class="card-body">

            <form action="actualizar.php" method="POST">

                <input type="hidden"
                name="ID"
                value="<?php echo $paciente['ID']; ?>">

                <div class="mb-3">

                    <label class="form-label">
                        Nombre
                    </label>

                    <input type="text"
                    name="Nombre"
                    class="form-control"
                    value="<?php echo $paciente['Nombre']; ?>"
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Apellido Paterno
                    </label>

                    <input type="text"
                    name="Apellido_Paterno"
                    class="form-control"
                    value="<?php echo $paciente['Apellido_Paterno']; ?>"
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Apellido Materno
                    </label>

                    <input type="text"
                    name="Apellido_Materno"
                    class="form-control"
                    value="<?php echo $paciente['Apellido_Materno']; ?>">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Género
                    </label>

                    <input type="text"
                    name="Genero"
                    class="form-control"
                    value="<?php echo $paciente['Genero']; ?>">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        País
                    </label>

                    <input type="text"
                    name="Pais_Origen"
                    class="form-control"
                    value="<?php echo $paciente['Pais_Origen']; ?>">

                </div>

                <button type="submit"
                class="btn btn-success">

                    Actualizar

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