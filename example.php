<?php 

include "habEncrypt.php";

$has = new habEncrypt();

$string = 'Lorem Ipsum doller Sit';
$key = "123456789";
$enc = $has->enc($string, $key);
$dec = $has->dec($enc, $key);

var_dump("Integer only Key. encrypted Value: \"$enc\". Original and decrypted Value: \"$dec\"");

$key = "abc123def456";
$enc = $has->enc($string, $key);
$dec = $has->dec($enc, $key);

var_dump("String Key. encrypted Value: \"$enc\". Original and decrypted Value: \"$dec\"");


$key = "123456789";
$enc = $has->b64enc($string, $key);
$dec = $has->b64dec($enc, $key);

var_dump("Integer only Key(Base64 Version). encrypted Value: \"$enc\". Original and decrypted Value: \"$dec\"");

$key = "abc123def456";
$enc = $has->b64enc($string, $key);
$dec = $has->b64dec($enc, $key);

var_dump("String Key(Base64 Version). encrypted Value: \"$enc\". Original and decrypted Value: \"$dec\"");


$path = "dummy.jpg";
$key = "abc123def456";
$enc = $has->fileEnc($path, $key);
$dec = $has->dec($enc, $key);

//var_dump("String Key(Base64 Version). encrypted Value: \"$enc\". Original and decrypted Value: \"$dec\"");

