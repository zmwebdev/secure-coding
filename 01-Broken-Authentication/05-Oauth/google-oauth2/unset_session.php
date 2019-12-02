<?php
/* Ez du google logout egiten! beste modu batetara egin beharko da...*/
session_start();
unset($_SESSION['access_token']);

header("Location: oauth.php");