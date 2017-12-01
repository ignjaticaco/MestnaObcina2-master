<?php
session_start();

require_once __DIR__.'/vendor/autoload.php';
require 'db.php';

$id_token = $_POST['idtoken'];

if(!empty($id_token))
{
    try {
        $client = new Google_Client(['client_id' => "548013672380-r075g6cgqk4ekjgikkktmimk1qlo90r0.apps.googleusercontent.com"]);
        $payload = $client->verifyIdToken($id_token);
        if ($payload) 
        {
            $userid = $payload['sub'];
            echo "Signed in as " . $payload['name'];
        } 
        else 
        {
            http_response_code(400);
            echo 'invalid token given';
    
        }
    }
    catch (\Exception $e) {
        http_response_code(400);
        echo "Token verification failed: " . $e->getMessage();
        exit;
    }
}
else 
{
    http_response_code(400);
    echo 'token not set'; 
}

$SQL = "SELECT id FROM uporabniki WHERE google_id='$userid';";

$query = mysqli_query($conn, $SQL);
$count = mysqli_num_rows($query);
$result = mysqli_fetch_array($query);
if($count > 0)
{
    $_SESSION['mail'] = $payload['mail'];
    $_SESSION['google_id'] = $userid;
    $_SESSION['id'] = $result['id'];
}
else
{
    $google_id = $payload['sub'];
    $ime = $payload['name'];
    $eposta = $payload['email'];
    $query2 = "INSERT INTO uporabniki (google_id, ime, email)
            VALUES('$google_id', '$ime', '$eposta');";
    $result2 = mysqli_query($conn, $query2);
    if($result2)
    {
        $_SESSION['mail'] = $eposta;
        $_SESSION['google_id'] = $userid;
        $_SESSION['id'] = $result2;
    }
    else
    {
        http_response_code(400);
        echo 'Napaka!';
        exit;
    }
}
