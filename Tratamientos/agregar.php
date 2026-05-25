<?php

include("../ConexiónConMedDB.php");

$sqlClinicas = "SELECT * FROM Clinicas";

$stmtClinicas = $conn->query($sqlClinicas);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Agregar Tratamiento</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h2 class="mb-0">
                Nuevo Tratamiento
            </h2>

        </div>

        <div class="card-body">

            <form action="insertar.php" method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Clínica
                    </label>

                    <select name="ID_Clinica"
                    class="form-select"
                    required>

                        <option value="">
                            Selecciona una Clínica
                        </option>

                        <?php while($clinica = $stmtClinicas->fetch(PDO::FETCH_ASSOC)){ ?>

                            <option value="<?php echo $clinica['ID']; ?>">

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
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Descripción
                    </label>

                    <textarea name="Descripcion_Tratamiento"
                    class="form-control"
                    rows="4"></textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Duración (Días)
                    </label>

                    <input type="number"
                    name="Duracion_Dias"
                    class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Costo
                    </label>

                    <input type="number"
                    step="0.01"
                    name="Costo"
                    class="form-control">

                </div>

                <button type="submit"
                class="btn btn-success">

                    Guardar Tratamiento

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