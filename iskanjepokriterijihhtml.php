<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <form action="index.php" method="get">
                <p>Velikost</p> 
                od:<input type="text" name="velikostod">
                do:<input type="text" name="velikostdo"><br>
                <p>Lokacija</p>
                <select name="lokacija">
                    <?php
                        session_start();
                        require 'db.php';
                        mysqli_query($conn, "SET NAMES 'utf8'");
                        $query = "SELECT lokacija FROM poslovni_prostori WHERE";
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result))
                        {
                            echo '<option value="'. $row['ime'] .'">' .$row['ime']. '</option>';
                        }
                    ?>
                </select><br>
                <p>Najemnina</p>
                od:<input type="text" name="najemninaod">
                do:<input type="text" name="najemninado">
                <input type="submit" value="Submit">
            </form>
        </div>
    </body>
</html>


