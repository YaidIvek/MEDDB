<?php

include("../ConexiónConMedDB.php");

$ID = $_POST['ID'];

$ID_Paciente = $_POST['ID_Paciente'];

$ID_Tratamiento = $_POST['ID_Tratamiento'];

$Fecha_Reservacion = $_POST['Fecha_Reservacion'];

$Fecha_Tratamiento = $_POST['Fecha_Tratamiento'];

$Estado = $_POST['Estado'];

$sql = "UPDATE Reservaciones SET

ID_Paciente = :ID_Paciente,
ID_Tratamiento = :ID_Tratamiento,
Fecha_Reservacion = :Fecha_Reservacion,
Fecha_Tratamiento = :Fecha_Tratamiento,
Estado = :Estado

WHERE ID = :ID";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':ID_Paciente', $ID_Paciente);

$stmt->bindParam(':ID_Tratamiento', $ID_Tratamiento);

$stmt->bindParam(':Fecha_Reservacion', $Fecha_Reservacion);

$stmt->bindParam(':Fecha_Tratamiento', $Fecha_Tratamiento);

$stmt->bindParam(':Estado', $Estado);

$stmt->bindParam(':ID', $ID);

if($stmt->execute()){

    header("Location: index.php");
    exit();

}else{

    echo "Error al actualizar";

}

?>