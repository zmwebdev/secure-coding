<?php

/****************** */
if (isset($_POST['g-recaptcha-response'])) {
    $captcha = $_POST['g-recaptcha-response'];
} else {
    $captcha = false;
}

if (!$captcha) {
    //Do something with error
} else {
    $secret   = '6LeHeL8UAAAAAK0UZUL-w9FsXBInhGn66-VVUy-9';
    $response = file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']
    );
    // use json_decode to extract json response
    $response = json_decode($response);
    var_dump($response);

    if ($response->success === false) {
        //Do something with error
        echo "KO";
    }
}

//... The Captcha is valid you can continue with the rest of your code
//... Add code to filter access using $response . score

if ($response->success==true && $response->score <= 0.5) {
    //Do something to denied access
    echo "KO";
} else {
    echo "Captcha OK";


    /****************** */
    
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
    
    //$user =  $_GET['user'];
    $user =  $_POST['user'];
    
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
    
}
