<?php

include("../ConexiónConMedDB.php");

$ID_Clinica = $_POST['ID_Clinica'];

$Nombre_Tratamiento = $_POST['Nombre_Tratamiento'];

$Descripcion_Tratamiento = $_POST['Descripcion_Tratamiento'];

$Duracion_Dias = $_POST['Duracion_Dias'];

$Costo = $_POST['Costo'];

$sql = "INSERT INTO Tratamientos
(
    ID_Clinica,
    Nombre_Tratamiento,
    Descripcion_Tratamiento,
    Duracion_Dias,
    Costo
)

VALUES
(
    :ID_Clinica,
    :Nombre_Tratamiento,
    :Descripcion_Tratamiento,
    :Duracion_Dias,
    :Costo
)";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':ID_Clinica', $ID_Clinica);

$stmt->bindParam(':Nombre_Tratamiento', $Nombre_Tratamiento);

$stmt->bindParam(':Descripcion_Tratamiento', $Descripcion_Tratamiento);

$stmt->bindParam(':Duracion_Dias', $Duracion_Dias);

$stmt->bindParam(':Costo', $Costo);

if($stmt->execute()){

    header("Location: index.php");
    exit();

}else{

    echo "Error al guardar";

}

?>