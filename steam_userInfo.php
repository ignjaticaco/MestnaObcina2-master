<?php
session_start();
require 'steamauth/userInfo.php';
require 'db.php';

$steamid = $steamprofile['steamid'];

$SQL = "SELECT id FROM uporabniki WHERE steam_id='$steamid';";

$query = mysqli_query($conn, $SQL);
$count = mysqli_num_rows($query);
$result = mysqli_fetch_array($query);

if($count > 0)
{
    $_SESSION['steam_id'] = $steamid;
    $_SESSION['id'] = $result['id'];
    header("location: index.php");
}
else
{
    $query2 = "INSERT INTO uporabniki (steam_id)
            VALUES('$steamid');";
    $result2 = mysqli_query($conn, $query2);
    if($result2)
    {
        $_SESSION['steamid'] = $steamid;
        $_SESSION['id'] = $result2['id'];
        header("location: index.php");
    }
    else
    {
        http_response_code(400);
        echo 'Napaka!';
        exit;
    }
}
