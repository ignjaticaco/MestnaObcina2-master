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
        <div id="third">
<?php
    $id=$_GET['id'];
    $sql = "SELECT * FROM poslovni_prostori WHERE id=6";
    $sql2 = "SELECT url FROM videoposnetki WHERE id_poslovni_prostor = 6";
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
            echo "<div class=\"text3\"> Lokacija: </div><div class=\"text3\">$lokacija</div>
                <div class=\"text3\"> Velikost: </div><div class=\"text3\">$velikost</div>
                <div class=\"text3\"> Najemnina: </div><div class=\"text3\">$najemnina</div>
                <div class=\"text3\"> Prosto: </div><div class=\"text3\">$prosto</div>
                <div class=\"text3\"> Stanje: </div><div class=\"text3\">$stanje</div>
                <div class=\"text3\"> Začetek: </div><div class=\"text3\">$zacetek</div>
                <div class=\"text3\"> Konec: </div><div class=\"text3\">$konec</div>
                <div class=\"text3\"> Opis: </div><div class=\"text3\">$opis</div>
                <img src=$slika width=450 height=300 alt=\"Slika\" class=\"img-responsive\">
            <div class=\"text3\" id=\"margin\"><iframe width=450 height=300 src=".$row2['url']." frameborder=0 allowfullscreen></iframe>
        </div>";
        }?>
        <div class="text3"><a href="IFprijavljenLahkoPoslje.php">Pošlji povpraševanje</a></div></div>
</body>
</html>
