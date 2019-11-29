<?php

session_start();
if (!isset($_SESSION['access_token'])) {
    header('Location: oauth.php');
} 
    
echo "<h1>Login OK</h1>";

echo "<a href='unset_session.php'>logout</a>";
