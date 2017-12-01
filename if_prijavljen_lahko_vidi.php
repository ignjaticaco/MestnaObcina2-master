<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (isset($_SESSION['id']))
        {
           $sql = "SELECT * FROM poslovni_prostori";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result))
        {
            $id= $row['id'];
            $lokacija = $row['lokacija'];
            $velikost = $row['velikost'];
            $najemnina = $row['najemnina'];
            $opis = $row['opis'];
            if ($row['prosto'] == 0)
            {
                $oddano = $row['prosto'];
                $oddano = "Prostor je oddan";
            }
            else
            {
                $oddano = $row['prosto'];
                $oddano = "Prostor je prost";
            }
            echo "<table border=1>";
            echo "<tr>
                  <td>$lokacija</td>
                  <td>$velikost</td>
                  <td>$najemnina</td>
                   <td>$opis</td>";
            if ($oddano == "Prostor je prost")
                 {
                     "<td>Prostor je prost <form method=\"post\" action=\"prostor_p_check.php?id=$id\">"
                .  "<input type=\"submit\" name=\"submit\" value=\"Zasedi prostor\"></td></tr>";
                 }
            else 
            {
                "<td>Prostor je zaseden</td></tr>";
            }
        }
        echo "</table>";
        }
        ?>
        
    </body>
</html>
