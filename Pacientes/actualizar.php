<?php

include("../ConexiónConMedDB.php");

$ID = $_POST['ID'];

$Nombre = $_POST['Nombre'];

$Apellido_Paterno = $_POST['Apellido_Paterno'];

$Apellido_Materno = $_POST['Apellido_Materno'];

$Genero = $_POST['Genero'];

$Pais_Origen = $_POST['Pais_Origen'];

$sql = "UPDATE Pacientes SET

Nombre = :Nombre,
Apellido_Paterno = :Apellido_Paterno,
Apellido_Materno = :Apellido_Materno,
Genero = :Genero,
Pais_Origen = :Pais_Origen

WHERE ID = :ID";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':Nombre', $Nombre);
$stmt->bindParam(':Apellido_Paterno', $Apellido_Paterno);
$stmt->bindParam(':Apellido_Materno', $Apellido_Materno);
$stmt->bindParam(':Genero', $Genero);
$stmt->bindParam(':Pais_Origen', $Pais_Origen);
$stmt->bindParam(':ID', $ID);

if($stmt->execute()){

    header("Location: index.php");
    exit();

}else{

    echo "Error al actualizar";

}

?>