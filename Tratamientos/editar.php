<?php

include("../ConexiónConMedDB.php");

$id = $_GET['id'];

$sqlTratamiento = "SELECT * FROM Tratamientos
                   WHERE ID = :id";

$stmtTratamiento = $conn->prepare($sqlTratamiento);

$stmtTratamiento->bindParam(':id', $id);

$stmtTratamiento->execute();

$tratamiento = $stmtTratamiento->fetch(PDO::FETCH_ASSOC);

$sqlClinicas = "SELECT * FROM Clinicas";

$stmtClinicas = $conn->query($sqlClinicas);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Editar Tratamiento</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-warning text-dark">

            <h2 class="mb-0">
                Editar Tratamiento
            </h2>

        </div>

        <div class="card-body">

            <form action="actualizar.php" method="POST">

                <input type="hidden"
                name="ID"
                value="<?php echo $tratamiento['ID']; ?>">

                <div class="mb-3">

                    <label class="form-label">
                        Clínica
                    </label>

                    <select name="ID_Clinica"
                    class="form-select"
                    required>

                        <?php while($clinica = $stmtClinicas->fetch(PDO::FETCH_ASSOC)){ ?>

                            <option
                            value="<?php echo $clinica['ID']; ?>"

                            <?php
                            if($clinica['ID'] == $tratamiento['ID_Clinica']){
                                echo "selected";
                            }
                            ?>>

                                <?php echo $clinica['Num_Clinica']; ?>

                            </option>

                        <?php } ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Nombre Tratamiento
                    </label>

                    <input type="text"
                    name="Nombre_Tratamiento"
                    class="form-control"
                    value="<?php echo $tratamiento['Nombre_Tratamiento']; ?>"
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Descripción
                    </label>

                    <textarea
                    name="Descripcion_Tratamiento"
                    class="form-control"
                    rows="4"><?php echo $tratamiento['Descripcion_Tratamiento']; ?></textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Duración Días
                    </label>

                    <input type="number"
                    name="Duracion_Dias"
                    class="form-control"
                    value="<?php echo $tratamiento['Duracion_Dias']; ?>">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Costo
                    </label>

                    <input type="number"
                    step="0.01"
                    name="Costo"
                    class="form-control"
                    value="<?php echo $tratamiento['Costo']; ?>">

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