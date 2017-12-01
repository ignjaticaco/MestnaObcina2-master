<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        <title></title>
    </head>
    <body>
        <?php
session_start();
if (isset($_SESSION['id'])) {
    $div_id=$_GET['id'];
    ?>
   <?php
    echo '
        <div id="third">
        <h1>Vprašaj</h1>
        <form action="http://localhost/MestnaObcina/InsertPovprasevanje.php/?id='.$div_id.'" method="post">
        <div class="text"> Vprašaj: </div><div class="box"><input type="text" name="povprasevanje"></div>
        <div id="submit"><input type="submit" value="Pošlji"></div>
        </form>
        </div>';
}
         else {
    echo "Please log in first to see this page."
    . "<a href ='login.php'> Klikni tukaj za prijavo </a> ";
}
?>
    </body>
</html>
