<?php
include_once './db.php';
$id_div = $_GET ["id"] ;
$sql = "UPDATE poslovni_prostori SET odobritev='1' WHERE id = $id_div";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    echo '<a href="http://localhost/MestnaObcina/adminOdobritev.php">NAZAJ NA ADMIN STRAN </a>';
} else {
    echo "Error updating record: " . $conn->error;
    echo '<a href="http://localhost/MestnaObcina/adminOdobritev.php">NAZAJ NA ADMIN STRAN </a>';
}

$conn->close();
?>


