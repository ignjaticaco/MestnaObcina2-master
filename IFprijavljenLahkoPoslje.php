<?php
session_start();
if (isset($_SESSION['id'])) {
    
    location:('povprasevanje.php');
} else {
    echo "Please log in first to see this page."
    . "<a href ='login.php'> Klikni tukaj za prijavo </a> ";
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

