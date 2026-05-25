<?php

include("../ConexiónConMedDB.php");

$sqlReservaciones = "

SELECT Reservaciones.ID,

       Pacientes.Nombre,
       Pacientes.Apellido_Paterno,

       Tratamientos.Nombre_Tratamiento

FROM Reservaciones

INNER JOIN Pacientes
ON Reservaciones.ID_Paciente = Pacientes.ID

INNER JOIN Tratamientos
ON Reservaciones.ID_Tratamiento = Tratamientos.ID

";

$stmtReservaciones = $conn->query($sqlReservaciones);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Agregar Pago</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h2>Nuevo Pago</h2>

        </div>

        <div class="card-body">

            <form action="insertar.php" method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Reservacion
                    </label>

                    <select name="ID_Reservacion"
                    class="form-select"
                    required>

                        <option value="">
                            Selecciona una Reservacion
                        </option>

                        <?php while($res = $stmtReservaciones->fetch(PDO::FETCH_ASSOC)){ ?>

                            <option value="<?php echo $res['ID']; ?>">

                                <?php

                                echo $res['Nombre'] . " " .
                                     $res['Apellido_Paterno'] .
                                     " - " .
                                     $res['Nombre_Tratamiento'];

                                ?>

                            </option>

                        <?php } ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Monto
                    </label>

                    <input type="number"
                    step="0.01"
                    min="0"
                    name="Monto"
                    class="form-control"
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Metodo de Pago
                    </label>

                    <input type="text"
                    name="Metodo_Pago"
                    class="form-control"
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Fecha de Pago
                    </label>

                    <input type="date"
                    name="Fecha_Pago"
                    class="form-control"
                    required>

                </div>

                <button type="submit"
                class="btn btn-success">

                    Guardar Pago

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