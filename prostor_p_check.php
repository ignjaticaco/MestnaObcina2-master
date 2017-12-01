<?php
        $sql= "UPDATE poslovni_prostori"
                . "SET prosto = 0"
                . "WHERE (id = '$id')";
        
        $uporabnik_id = $_SESSION['id'];
        $sql2 = "INSERT INTO poslovni_prostori_uporabniki (id_uporabnik, id_poslovni_prostor)"
                . "VALUES ('$uporabink_id', '$id')";
        
        if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2))
    {
            header("Location: prostori.php");
    } 
    else{
        echo "Prišlo je do napake";
        echo "<li><a href=\"prostori.php\">Nazaj na prostore</a></li>";
    }

