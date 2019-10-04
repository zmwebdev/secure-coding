<?php
echo "bai";
require_once 'vendor/autoload.php';

use PragmaRX\Google2FA\Google2FA;
    
$google2fa = new Google2FA();
    
return $google2fa->generateSecretKey();
echo "bai";
//Generate a secret key for your user and save it:
$user->google2fa_secret = $google2fa->generateSecretKey();
echo $user->google2fa_secret;
echo "bai";
/*
// QR code
$qrCodeUrl = $google2fa->getQRCodeUrl(
    $companyName,
    $companyEmail,
    $secretKey
);
// Use your own QR Code generator to generate a data URL:
$google2fa_url = custom_generate_qrcode_url($qrCodeUrl);

/// and in your view:

<img src="{{ $google2fa_url }}" alt="">
*/
