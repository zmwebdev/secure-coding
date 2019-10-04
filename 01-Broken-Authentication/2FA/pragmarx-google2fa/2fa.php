<?php
require_once 'vendor/autoload.php';

$google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());

//$google2fa_secret = $google2fa->generateSecretKey();
$google2fa_secret = $google2fa->generateSecretKey(32);  // key luzeagoa
$inlineUrl = $google2fa->getQRCodeInline(
    'Company Name',
    'company@email.com',
    $google2fa_secret
);

echo '<img src="'.$inlineUrl.'" />';
echo $google2fa_secret;
