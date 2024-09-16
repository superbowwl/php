<?php
header('Access-Control-Allow-Origin: *');
$cf_secret = '0x4AAAAAAAazeff3ckCYMwB5_TXMuCYN_aE';
if(isset($_POST['token'])){
    $token = $_POST['token'];
    $ch = curl_init();

    $d = [];
    $d['secret'] = $cf_secret;
    $d['response'] = $token;

    curl_setopt($ch, CURLOPT_URL,"https://challenges.cloudflare.com/turnstile/v0/siteverify");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$d);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $o = curl_exec($ch);

    curl_close($ch);
    echo $o;
    die();
}
