<?php

session_start();
if (!isset($_SESSION['access_token'])) {
    header('Location: oauth.php');
} 

$email = $_SESSION['email'];
//echo "<h1>Login OK</h1>";
echo "<h1>Kaixo $email</h1>";

/*echo "<a href='unset_session.php'>logout</a>";*/
