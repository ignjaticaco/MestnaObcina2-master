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
        <h1>Dodaj prostor</h1>
        <form action="dodajProstor2.php" method="post" enctype="multipart/form-data">
        <div class="text"> Stanje: </div><div class="box"><input type="text" name="stanje"></div>
        <div class="text"> Velikost: </div><div class="box"><input type="number" name="velikost"></div>
        <div class="text"> Lokacija: </div><div class="box"><input type="text" name="lokacija"></div>
        <div class="text"> Najemnina: </div><div class="box"><input type="number" name="najemnina"></div>
        <div class="text"> Opis: </div><div class="box"><input type="text" name="opis"></div>
        <div class="text"> Začetek: </div><div class="box"><input type="date" name="zacetek"></div>
        <div class="text"> Konec: </div><div class="box"><input type="date" name="konec"></div>
        <div class="text"> Slika: </div><div class="box"><input type="file" name="fileToUpload" id="fileToUpload"></div>
        <div class="text"> Videoposnetek - Embed URL (Youtube): </div><div class="box"><input type="text" name="url"></div>
        <div id="submit"><input type="submit" value="Upload Image" name="submit"></div>
        </form>
        </div>
    </body>
</html>
