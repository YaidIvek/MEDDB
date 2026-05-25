<!DOCTYPE html>
<html>

<head>

    <title>Agregar Hospedaje</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h2 class="mb-0">
                Nuevo Hospedaje
            </h2>

        </div>

        <div class="card-body">

            <form action="insertar.php" method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Nombre Hotel
                    </label>

                    <input type="text"
                    name="Nombre_Hotel"
                    class="form-control"
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Dirección
                    </label>

                    <input type="text"
                    name="Direccion"
                    class="form-control"
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Tipo Habitación
                    </label>

                    <input type="text"
                    name="Tipo_Habitacion"
                    class="form-control"
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
                    required>

                </div>

                <button type="submit"
                class="btn btn-success">

                    Guardar Hospedaje

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