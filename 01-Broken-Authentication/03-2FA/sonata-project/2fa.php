<?php

require_once 'vendor/autoload.php';

//
$username = 'koxme';

$g = new \Google\Authenticator\GoogleAuthenticator();
//$g = new Sonata\GoogleAuthenticator\GoogleAuthenticator();
$salt = '7WAO342QFANY6IKBF7L7SWEUU79WL3VMT920VB5NQMW';
$secret = $username.$salt;
echo '<img src="'.$g->getURL($username, 'uni.eus', $secret).'" />';