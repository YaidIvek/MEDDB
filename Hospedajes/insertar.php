<?php

include("../ConexiónConMedDB.php");

$Nombre_Hotel = $_POST['Nombre_Hotel'];

$Direccion = $_POST['Direccion'];

$Tipo_Habitacion = $_POST['Tipo_Habitacion'];

$Costo_Noche = $_POST['Costo_Noche'];

$sql = "INSERT INTO Hospedajes
(
    Nombre_Hotel,
    Direccion,
    Tipo_Habitacion,
    Costo_Noche
)

VALUES
(
    :Nombre_Hotel,
    :Direccion,
    :Tipo_Habitacion,
    :Costo_Noche
)";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':Nombre_Hotel', $Nombre_Hotel);

$stmt->bindParam(':Direccion', $Direccion);

$stmt->bindParam(':Tipo_Habitacion', $Tipo_Habitacion);

$stmt->bindParam(':Costo_Noche', $Costo_Noche);

if($stmt->execute()){

    header("Location: index.php");
    exit();

}else{

    echo "Error al guardar";

}

?>