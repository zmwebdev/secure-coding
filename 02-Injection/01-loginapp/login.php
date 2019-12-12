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
$user =  $_POST['user'];
$password = $_POST['password'];

//
$sql = "SELECT * FROM users WHERE user = '$user' and pass = '$password'";
//echo $sql . "<br>";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "erabiltzailea: " . $row["user"]. " / " . $row["pass"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
