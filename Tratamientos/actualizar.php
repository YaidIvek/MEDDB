<?php

include("../ConexiónConMedDB.php");

$ID = $_POST['ID'];

$ID_Clinica = $_POST['ID_Clinica'];

$Nombre_Tratamiento = $_POST['Nombre_Tratamiento'];

$Descripcion_Tratamiento = $_POST['Descripcion_Tratamiento'];

$Duracion_Dias = $_POST['Duracion_Dias'];

$Costo = $_POST['Costo'];

$sql = "UPDATE Tratamientos SET

ID_Clinica = :ID_Clinica,
Nombre_Tratamiento = :Nombre_Tratamiento,
Descripcion_Tratamiento = :Descripcion_Tratamiento,
Duracion_Dias = :Duracion_Dias,
Costo = :Costo

WHERE ID = :ID";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':ID_Clinica', $ID_Clinica);

$stmt->bindParam(':Nombre_Tratamiento', $Nombre_Tratamiento);

$stmt->bindParam(':Descripcion_Tratamiento', $Descripcion_Tratamiento);

$stmt->bindParam(':Duracion_Dias', $Duracion_Dias);

$stmt->bindParam(':Costo', $Costo);

$stmt->bindParam(':ID', $ID);

if($stmt->execute()){

    header("Location: index.php");
    exit();

}else{

    echo "Error al actualizar";

}

?>