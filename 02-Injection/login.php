<?php

/*
sql injection:

pasahitzaren inputean:
' OR '1'='1
' OR 1=1--'
*/

$servername = "localhost";
$username = "koxme";
$password = "pasahitza";
$dbname = "sql_injection";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//echo "Connected successfully";

// formulariotik bidalitako datuak irakurri
// leer desde el formulario
$user =  $_GET['user'];
$password = $_GET['password'];

//
$sql = "SELECT * FROM users WHERE user = '$user' AND pass = '$password'";
echo $sql . "<br>";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //echo "OK";
    //session_start();
    //$_SESSION["user"]=$user;
    header("Location: user_info.html");

} else{
    //echo "KO";
    header("Location: login.html");
}

$conn->close();
