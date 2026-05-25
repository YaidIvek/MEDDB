<!DOCTYPE html>
<html>

<head>

    <title>Agregar Paciente</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h2 class="mb-0">
                Nuevo Paciente
            </h2>

        </div>

        <div class="card-body">

            <form action="insertar.php" method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Nombre
                    </label>

                    <input type="text"
                    name="Nombre"
                    class="form-control"
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Apellido Paterno
                    </label>

                    <input type="text"
                    name="Apellido_Paterno"
                    class="form-control"
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Apellido Materno
                    </label>

                    <input type="text"
                    name="Apellido_Materno"
                    class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Fecha de Nacimiento
                    </label>

                    <input type="date"
                    name="Fecha_de_Nacimiento"
                    class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Género
                    </label>

                    <input type="text"
                    name="Genero"
                    class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        País de Origen
                    </label>

                    <input type="text"
                    name="Pais_Origen"
                    class="form-control">

                </div>

                <button type="submit"
                class="btn btn-success">

                    Guardar Paciente

                </button>

                <a href="../MenuDB.php"
                class="btn btn-secondary">

                    Volver al Menu

                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>