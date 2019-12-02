<?php
require_once __DIR__.'/vendor/autoload.php';

session_start();

/* https://developers.google.com/identity/protocols/OAuth2 */
$client = new Google_Client();

// segurtasun arazoa dago. Kredentzialak fitxategi batean gordeta dauzkagu eta
// edozeinek irakurri ditzake 
$client->setAuthConfig('client_secrets.json');

//$client->addScope(Google_Service_Drive::DRIVE_METADATA_READONLY);
// https://developers.google.com/identity/protocols/googlescopes?hl=en_US
$client->addScope("https://www.googleapis.com/auth/userinfo.email");
//$client->addScope("https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile");

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
  //
  //var_dump($client);
  $oauth2 = new Google_Service_Oauth2($client);
  $userInfo = $oauth2->userinfo->get();
  //print_r($userInfo);
  $_SESSION['email'] = $userInfo->email;
  //
  header('Location: login_ok.php');
} else {
  $folder = "/workspace/secure-coding/01-Broken-Authentication/05-Oauth/google-oauth2";
  $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $folder . '/oauth2callback.php';
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}
