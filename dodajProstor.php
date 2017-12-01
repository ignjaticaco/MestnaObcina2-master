<?php
session_start();
if (isset($_SESSION['id'])) {
    
    location:('dodajanjeProstora.php');
} else {
    echo "Please log in first to see this page."
    . "<a href ='http://localhost/MestnaObcina/login.php'> Klikni tukaj za prijavo </a> ";
}

