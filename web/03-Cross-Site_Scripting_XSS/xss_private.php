<?php

// orri pribatua. Soilik $_SESSION["user"] ezarria izan bada erabili daiteke 

session_start();
if (!isset($_SESSION["user"])) {
    header("Location: xss.php");
} 

echo "Kaixo " . $_SESSION['user'] . "<br>";