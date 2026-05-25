<?php

include("../ConexiónConMedDB.php");

$sqlPacientes = "SELECT * FROM Pacientes";

$stmtPacientes = $conn->query($sqlPacientes);

$sqlTratamientos = "SELECT * FROM Tratamientos";

$stmtTratamientos = $conn->query($sqlTratamientos);

$sqlHospedajes = "SELECT * FROM Hospedajes";

$stmtHospedajes = $conn->query($sqlHospedajes);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Agregar Reservación</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h2 class="mb-0">
                Nueva Reservación
            </h2>

        </div>

        <div class="card-body">

            <form action="insertar.php" method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Paciente
                    </label>

                    <select name="ID_Paciente"
                    class="form-select"
                    required>

                        <option value="">
                            Selecciona un Paciente
                        </option>

                        <?php while($paciente = $stmtPacientes->fetch(PDO::FETCH_ASSOC)){ ?>

                            <option value="<?php echo $paciente['ID']; ?>">

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

                        <option value="">
                            Selecciona un Tratamiento
                        </option>

                        <?php while($tratamiento = $stmtTratamientos->fetch(PDO::FETCH_ASSOC)){ ?>

                            <option value="<?php echo $tratamiento['ID']; ?>">

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
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Fecha Tratamiento
                    </label>

                    <input type="date"
                    name="Fecha_Tratamiento"
                    class="form-control"
                    required>

                </div>

                <hr>

                <h4 class="mb-3">
                    Información de Hospedaje
                </h4>

                <div class="mb-3">

                    <label class="form-label">
                        Hospedaje
                    </label>

                    <select name="ID_Hospedaje"
                    class="form-select">

                        <option value="">
                            Selecciona un Hospedaje
                        </option>

                        <?php while($hospedaje = $stmtHospedajes->fetch(PDO::FETCH_ASSOC)){ ?>

                            <option value="<?php echo $hospedaje['ID']; ?>">

                                <?php echo $hospedaje['Nombre_Hotel']; ?>

                            </option>

                        <?php } ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Fecha Entrada
                    </label>

                    <input type="date"
                    name="Fecha_Entrada"
                    class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Fecha Salida
                    </label>

                    <input type="date"
                    name="Fecha_Salida"
                    class="form-control">

                </div>

                <input type="hidden"
                name="Estado"
                value="Pendiente">

                <button type="submit"
                class="btn btn-success">

                    Guardar Reservación

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