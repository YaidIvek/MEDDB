<?php

include("../ConexiónConMedDB.php");

$ID = $_POST['ID'];

$Num_Clinica = $_POST['Num_Clinica'];

$Tipo_Clinica = $_POST['Tipo_Clinica'];

$Direccion = $_POST['Direccion'];

$sql = "UPDATE Clinicas SET

Num_Clinica = :Num_Clinica,
Tipo_Clinica = :Tipo_Clinica,
Direccion = :Direccion

WHERE ID = :ID";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':Num_Clinica', $Num_Clinica);

$stmt->bindParam(':Tipo_Clinica', $Tipo_Clinica);

$stmt->bindParam(':Direccion', $Direccion);

$stmt->bindParam(':ID', $ID);

if($stmt->execute()){

    header("Location: index.php");
    exit();

}else{

    echo "Error al actualizar";

}

?>