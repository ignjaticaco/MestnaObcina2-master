<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mestna_obcina";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$vsebina  = $_POST['povprasevanje'];
$id = $_SESSION ['id'];
$id_div = $_GET ['id'] ;
$sql = "INSERT INTO povprasevanja (id_uporabnik, vsebina, id_poslovni_prostor)
VALUES ($id,'$vsebina',$id_div)";


if ($conn->query($sql) === TRUE) {
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


     header( "Location: http://localhost/MestnaObcina/index.php" );

?>
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

