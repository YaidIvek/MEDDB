<?php

include("../ConexiónConMedDB.php");

$id = $_GET['id'];

$sql = "DELETE FROM Hospedajes
        WHERE ID = :id";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':id', $id);

if($stmt->execute()){

    header("Location: index.php");
    exit();

}else{

    echo "Error al eliminar";

}

?>