
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once './db.php';
        error_reporting(0);
        
        $sql = "SELECT * FROM poslovni_prostori WHERE odobritev=0";
        $result = $conn->query($sql);
        
        while($row = $result->fetch_assoc()) { 
            echo "<div id=".$row[id].">";
            echo $row[stanje];
            echo $row[velikost];
            echo $row[lokacija];
            echo $row[najemnina];
            echo $row[prosto];
            echo $row[opis];
            echo $row[zacetek];
            echo $row[konec];
            echo '<a href ="odobren.php/?id='.$row[id].'"> JA </a>';
            echo '<a href ="zavrnjen.php/?id='.$row[id].'"> NE </a>';
            echo "</div>";
        }
        ?>
    </body>
</html>
