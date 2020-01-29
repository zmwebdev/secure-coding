<?php

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

// formulariotik bidalitako datuak irakurri

$user =  $_GET['user'];
//$user =  $_POST['user'];

// $user = htmlspecialchars($user);

/*
$user datua "satinize / scape / ..." egin behar da:

https://www.ptsecurity.com/ww-en/analytics/knowledge-base/how-to-prevent-sql-injection-attacks/
https://stackoverflow.com/questions/60174/how-can-i-prevent-sql-injection-in-php
https://stackoverflow.com/questions/129677/how-can-i-sanitize-user-input-with-php
*/

/*
python sqlmap.py "http://.../user_info_secured.php?user=1" -batch --dbs

[WARNING] GET parameter 'user' does not seem to be injectable
[CRITICAL] all tested parameters do not appear to be injectable ...
*/

$sql = "SELECT * FROM users WHERE user = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $user); // 's' specifies the variable type => 'string'

$stmt->execute();
$result = $stmt->get_result();
//$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        print_r($row);
        echo "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
