<?php
echo "bai";
require_once 'vendor/autoload.php';

$google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());

$inlineUrl = $google2fa->getQRCodeInline(
    'Company Name',
    'company@email.com',
    $google2fa->generateSecretKey()
);

echo '<img src="'.$inlineUrl.'" />';
