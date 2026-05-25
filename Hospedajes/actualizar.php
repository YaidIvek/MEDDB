<?php

include("../ConexiónConMedDB.php");

$ID = $_POST['ID'];

$Nombre_Hotel = $_POST['Nombre_Hotel'];

$Direccion = $_POST['Direccion'];

$Tipo_Habitacion = $_POST['Tipo_Habitacion'];

$Costo_Noche = $_POST['Costo_Noche'];

$sql = "UPDATE Hospedajes SET

Nombre_Hotel = :Nombre_Hotel,
Direccion = :Direccion,
Tipo_Habitacion = :Tipo_Habitacion,
Costo_Noche = :Costo_Noche

WHERE ID = :ID";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':Nombre_Hotel', $Nombre_Hotel);

$stmt->bindParam(':Direccion', $Direccion);

$stmt->bindParam(':Tipo_Habitacion', $Tipo_Habitacion);

$stmt->bindParam(':Costo_Noche', $Costo_Noche);

$stmt->bindParam(':ID', $ID);

if($stmt->execute()){

    header("Location: index.php");
    exit();

}else{

    echo "Error al actualizar";

}

?>