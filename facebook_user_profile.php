<?php
session_start();

require_once __DIR__.'/vendor/autoload.php';
require 'db.php';

$fb = new Facebook\Facebook([
  'app_id' => '117324138939152',
  'app_secret' => '659d55518dbaf90cfc812e59d64e7ea8',
  'default_graph_version' => 'v2.10',
  ]);

$id_token = $_POST['idtoken'];

if($id_token)
{
    try {
        $response = $fb->get('/me?fields=id,first_name,email,last_name', $id_token);
    }catch(Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        http_response_code(400);
        exit;
    }catch(Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        http_response_code(400);
        exit;
    }
}

$user = $response->getGraphUser();

$SQL = "SELECT id FROM uporabniki WHERE fb_id='$user[id]';";

$query = mysqli_query($conn, $SQL);
$count = mysqli_num_rows($query);
$result = mysqli_fetch_array($query);

if($count > 0)
{
    $_SESSION['mail'] = $user['email'];
    $_SESSION['fb_id'] = $user['id'];
    $_SESSION['id'] = $result['id'];
}
else
{
    $fb_id = $user['id'];
    $ime = $user['first_name'];
    $priimek = $user['last_name'];
    $email = $user['email'];
    $query2 = "INSERT INTO uporabniki (fb_id, ime, priimek, email)
            VALUES('$fb_id', '$ime', '$priimek', '$email');";
    $result2 = mysqli_query($conn, $query2);
    if($result2)
    {
        $_SESSION['mail'] = $user['email'];
        $_SESSION['fb_id'] = $fb_id;
        $_SESSION['id'] = $result2;
    }
    else
    {
        http_response_code(400);
        echo 'Napaka!';
        return;
    }
}
