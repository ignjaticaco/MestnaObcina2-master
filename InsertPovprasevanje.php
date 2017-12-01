<?php
session_start();
require 'db.php';
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$vsebina  = $_POST['povprasevanje'];
$id = $_SESSION['id'];
$id_div = $_GET['id'] ;
$sql = "INSERT INTO povprasevanja (id_uporabnik, vsebina, id_poslovni_prostor)
VALUES ($id,'$vsebina',$id_div)";

if ($conn->query($sql) === TRUE) 
{
    $sql = "SELECT email FROM uporabniki u INNER JOIN poslovni_prostori p ON u.id=p.uporabnik_id WHERE p.id=$id_div;";
    $query = mysqli_query($conn, $sql);
    var_dump($query);
    var_dump($id_div);
    if(!empty($sql))
    {
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 4;
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "mobcinav@gmail.com";
        $mail->Password = "mestnaobcina1";
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        $mail->Subject = "Obvestilo";
        $mail->Body = "Prejeli ste povpraševanje.";
        $mail->Body = " ";
        $mail->Body = $vsebina;
        $mail->setFrom('mobcinav@gmail.com', 'MOV');
        $mail->addAddress('daniel.kvar@gmail.com');
        if($mail->send())
            {
                echo '<script>'; 
                echo 'alert("Uspešno poslano!");'; 
                echo 'window.location.href = "http://localhost/MestnaObcina/index.php";';
                echo '</script>';
            }
            else
            {
                echo '<script>'; 
                echo 'alert("Napaka!");'; 
                echo 'window.location.href = "http://localhost/MestnaObcina/index.php";';
                echo '</script>';
            }
    }
    else
    {
        echo '<script>'; 
        echo 'alert("Ni Maila!");'; 
        echo 'window.location.href = "http://localhost/MestnaObcina/index.php";';
        echo '</script>';
    }
}
    else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();