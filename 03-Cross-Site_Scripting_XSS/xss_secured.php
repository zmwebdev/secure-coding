<?php

// secured to xss attack

session_start();
// https://config9.com/sec/set-httponly-and-secure-on-phpsessid-cookie-in-php/

// TODO and TEST

$_SESSION["user"]='koxme';

echo "erabilpena: http://.../?q=X <br>";

echo "<p>" . $_GET["q"] . "</p>";