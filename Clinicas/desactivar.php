<?php

include("../ConexiónConMedDB.php");

$id = $_GET['id'];

$sql = "

UPDATE Clinicas

SET Activo = 0

WHERE ID = :id

";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':id', $id);

$stmt->execute();

header("Location: index.php");

?>