<?php

include("../ConexiónConMedDB.php");

$ID_Paciente = $_POST['ID_Paciente'];

$ID_Tratamiento = $_POST['ID_Tratamiento'];

$Fecha_Reservacion = $_POST['Fecha_Reservacion'];

$Fecha_Tratamiento = $_POST['Fecha_Tratamiento'];

$Estado = $_POST['Estado'];

$ID_Hospedaje = $_POST['ID_Hospedaje'];

$Fecha_Entrada = $_POST['Fecha_Entrada'];

$Fecha_Salida = $_POST['Fecha_Salida'];

$sql = "

INSERT INTO Reservaciones
(
    ID_Paciente,
    ID_Tratamiento,
    Fecha_Reservacion,
    Fecha_Tratamiento,
    Estado
)

OUTPUT INSERTED.ID

VALUES
(
    :ID_Paciente,
    :ID_Tratamiento,
    :Fecha_Reservacion,
    :Fecha_Tratamiento,
    :Estado
)

";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':ID_Paciente', $ID_Paciente);

$stmt->bindParam(':ID_Tratamiento', $ID_Tratamiento);

$stmt->bindParam(':Fecha_Reservacion', $Fecha_Reservacion);

$stmt->bindParam(':Fecha_Tratamiento', $Fecha_Tratamiento);

$stmt->bindParam(':Estado', $Estado);

$stmt->execute();

$ID_Reservacion = $stmt->fetchColumn();

if(!empty($ID_Hospedaje)){

    $sqlHospedaje = "

    INSERT INTO Reservacion_Hospedaje
    (
        ID_Reservacion,
        ID_Hospedaje,
        Fecha_Entrada,
        Fecha_Salida
    )

    VALUES
    (
        :ID_Reservacion,
        :ID_Hospedaje,
        :Fecha_Entrada,
        :Fecha_Salida
    )

    ";

    $stmtHospedaje = $conn->prepare($sqlHospedaje);

    $stmtHospedaje->bindParam(':ID_Reservacion', $ID_Reservacion);

    $stmtHospedaje->bindParam(':ID_Hospedaje', $ID_Hospedaje);

    $stmtHospedaje->bindParam(':Fecha_Entrada', $Fecha_Entrada);

    $stmtHospedaje->bindParam(':Fecha_Salida', $Fecha_Salida);

    $stmtHospedaje->execute();

}

header("Location: index.php");

exit();

?>