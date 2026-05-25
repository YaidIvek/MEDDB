<?php

include("../ConexiónConMedDB.php");

$id = $_GET['id'];

$sqlReservacion = "SELECT * FROM Reservaciones
                   WHERE ID = :id";

$stmtReservacion = $conn->prepare($sqlReservacion);

$stmtReservacion->bindParam(':id', $id);

$stmtReservacion->execute();

$reservacion = $stmtReservacion->fetch(PDO::FETCH_ASSOC);

$sqlPacientes = "SELECT * FROM Pacientes";

$stmtPacientes = $conn->query($sqlPacientes);

$sqlTratamientos = "SELECT * FROM Tratamientos";

$stmtTratamientos = $conn->query($sqlTratamientos);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Editar Reservación</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-warning text-dark">

            <h2 class="mb-0">
                Editar Reservación
            </h2>

        </div>

        <div class="card-body">

            <form action="actualizar.php" method="POST">

                <input type="hidden"
                name="ID"
                value="<?php echo $reservacion['ID']; ?>">

                <div class="mb-3">

                    <label class="form-label">
                        Paciente
                    </label>

                    <select name="ID_Paciente"
                    class="form-select"
                    required>

                        <?php while($paciente = $stmtPacientes->fetch(PDO::FETCH_ASSOC)){ ?>

                            <option
                            value="<?php echo $paciente['ID']; ?>"

                            <?php
                            if($paciente['ID'] == $reservacion['ID_Paciente']){
                                echo "selected";
                            }
                            ?>>

                            <?php

                            echo $paciente['Nombre'] . " " .
                                 $paciente['Apellido_Paterno'];

                            ?>

                            </option>

                        <?php } ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Tratamiento
                    </label>

                    <select name="ID_Tratamiento"
                    class="form-select"
                    required>

                        <?php while($tratamiento = $stmtTratamientos->fetch(PDO::FETCH_ASSOC)){ ?>

                            <option
                            value="<?php echo $tratamiento['ID']; ?>"

                            <?php
                            if($tratamiento['ID'] == $reservacion['ID_Tratamiento']){
                                echo "selected";
                            }
                            ?>>

                            <?php echo $tratamiento['Nombre_Tratamiento']; ?>

                            </option>

                        <?php } ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Fecha Reservación
                    </label>

                    <input type="date"
                    name="Fecha_Reservacion"
                    class="form-control"
                    value="<?php echo $reservacion['Fecha_Reservacion']; ?>"
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Fecha Tratamiento
                    </label>

                    <input type="date"
                    name="Fecha_Tratamiento"
                    class="form-control"
                    value="<?php echo $reservacion['Fecha_Tratamiento']; ?>"
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Estado
                    </label>

                    <input type="text"
                    name="Estado"
                    class="form-control"
                    value="<?php echo $reservacion['Estado']; ?>"
                    readonly>

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