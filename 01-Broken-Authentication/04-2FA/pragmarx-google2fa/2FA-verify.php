<?php
require_once 'vendor/autoload.php';

$google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());


// Verify, you just have to:
// formulariotik jasotakoa. Erabiltzaileak sartu behar duena
//$secret = '638600';
$secret = $_POST['2facode'];
//echo "<br><br> secret: $secret";

$google2fa_secret = '3FKZAYFUU2QJXKTXOQD27RYPSGCWV3YF';
$valid = $google2fa->verifyKey($google2fa_secret, $secret);
//echo $valid;
echo "<br><br> valid? : ";
if ($valid) {
    echo "OK";
} else {
    echo "KO";
}