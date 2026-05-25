<?php

include("../ConexiónConMedDB.php");

$id = $_GET['id'];

$sql = "SELECT * FROM Clinicas
        WHERE ID = :id";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':id', $id);

$stmt->execute();

$clinica = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Editar Clínica</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-warning text-dark">

            <h2 class="mb-0">
                Editar Clínica
            </h2>

        </div>

        <div class="card-body">

            <form action="actualizar.php" method="POST">

                <input type="hidden"
                name="ID"
                value="<?php echo $clinica['ID']; ?>">

                <div class="mb-3">

                    <label class="form-label">
                        Número Clínica
                    </label>

                    <input type="text"
                    name="Num_Clinica"
                    class="form-control"
                    value="<?php echo $clinica['Num_Clinica']; ?>"
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Tipo Clínica
                    </label>

                    <input type="text"
                    name="Tipo_Clinica"
                    class="form-control"
                    value="<?php echo $clinica['Tipo_Clinica']; ?>"
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Dirección
                    </label>

                    <input type="text"
                    name="Direccion"
                    class="form-control"
                    value="<?php echo $clinica['Direccion']; ?>"
                    required>

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