<?php

$pass = 'qwerty';
$hash = password_hash($pass, PASSWORD_DEFAULT);

echo $hash;