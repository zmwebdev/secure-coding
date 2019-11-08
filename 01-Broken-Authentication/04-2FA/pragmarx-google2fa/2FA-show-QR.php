<?php
require_once 'vendor/autoload.php';

$google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());

$companyName = 'Company Name';
$companyEmail = 'company@email.com';

$google2fa_secret = '3FKZAYFUU2QJXKTXOQD27RYPSGCWV3YF';
$inlineUrl = $google2fa->getQRCodeInline(
    $companyName,
    $companyEmail,
    $google2fa_secret
);

echo '<img src="'.$inlineUrl.'" />';

$qrCodeUrl = $google2fa->getQRCodeUrl(
    $companyName,
    $companyEmail,
    $secretKey
);

echo '<br>' . $qrCodeUrl;