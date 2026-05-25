<?php

include("../ConexiónConMedDB.php");

$Num_Clinica = $_POST['Num_Clinica'];

$Tipo_Clinica = $_POST['Tipo_Clinica'];

$Direccion = $_POST['Direccion'];

$sql = "INSERT INTO Clinicas
(
    Num_Clinica,
    Tipo_Clinica,
    Direccion
)

VALUES
(
    :Num_Clinica,
    :Tipo_Clinica,
    :Direccion
)";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':Num_Clinica', $Num_Clinica);

$stmt->bindParam(':Tipo_Clinica', $Tipo_Clinica);

$stmt->bindParam(':Direccion', $Direccion);

if($stmt->execute()){

    header("Location: index.php");
    exit();

}else{

    echo "Error al guardar";

}

?>