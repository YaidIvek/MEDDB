<?php

include("../ConexiónConMedDB.php");

$id = $_GET['id'];

$sql = "SELECT * FROM Hospedajes
        WHERE ID = :id";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':id', $id);

$stmt->execute();

$hospedaje = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Editar Hospedaje</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-warning text-dark">

            <h2 class="mb-0">
                Editar Hospedaje
            </h2>

        </div>

        <div class="card-body">

            <form action="actualizar.php" method="POST">

                <input type="hidden"
                name="ID"
                value="<?php echo $hospedaje['ID']; ?>">

                <div class="mb-3">

                    <label class="form-label">
                        Nombre Hotel
                    </label>

                    <input type="text"
                    name="Nombre_Hotel"
                    class="form-control"
                    value="<?php echo $hospedaje['Nombre_Hotel']; ?>"
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Dirección
                    </label>

                    <input type="text"
                    name="Direccion"
                    class="form-control"
                    value="<?php echo $hospedaje['Direccion']; ?>"
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Tipo Habitación
                    </label>

                    <input type="text"
                    name="Tipo_Habitacion"
                    class="form-control"
                    value="<?php echo $hospedaje['Tipo_Habitacion']; ?>"
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Costo por Noche
                    </label>

                    <input type="number"
                    step="0.01"
                    name="Costo_Noche"
                    class="form-control"
                    value="<?php echo $hospedaje['Costo_Noche']; ?>"
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