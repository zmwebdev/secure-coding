<?php

session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.html");
} 

echo "Kaixo " . $_SESSION['user'] . "<br>";
echo "<a href='unset-session.php'>unset session</a>";