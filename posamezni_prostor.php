<?php
session_start();
include_once 'db.php'; ?>
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
    </head>
    <body>
<?php
    $id=$_GET['id'];
    $sql = "SELECT * FROM poslovni_prostori WHERE id=$id";
    $sql2 = "SELECT url FROM videoposnetki WHERE id_poslovni_prostor = $id";
        $result = mysqli_query($conn, $sql);
        $qry = mysqli_query($conn, $sql2);
        while ($row2 = mysqli_fetch_assoc($qry)) {
        while($row = mysqli_fetch_array($result))
        {
            $lokacija = $row['lokacija'];
            $velikost = $row['velikost'];
            $najemnina = $row['najemnina'];
            $prosto = $row['prosto'];
            $stanje = $row['stanje'];
            $zacetek = $row['zacetek'];
            $konec = $row['konec'];
            $slika = $row['slika'];
            $opis = $row['opis'];
        }
            echo "<div id=\"third\">
                <div class=\"text3\">$lokacija</div>
                <div class=\"text3\">$velikost</div>
                <div class=\"text3\">$najemnina</div>
                <div class=\"text3\">$prosto</div>
                <div class=\"text3\">$stanje</div>
                <div class=\"text3\">$zacetek</div>
                <div class=\"text3\">$konec</div>
                <img src=$slika alt=\"Slika\" class=\"img-responsive\">
                <div class=\"text3\">$opis</div>
            <div class=\"text3\"><iframe width=560 height=315 src=".$row2['url']." frameborder=0 allowfullscreen></iframe>
        </div></div>";
        }?>
</body>
</html>
