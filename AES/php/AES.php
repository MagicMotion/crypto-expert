
<?php


$encrypt1 = openssl_encrypt("123", 'AES-128-ECB', '0123456789ABCDEF', OPENSSL_RAW_DATA);

$encrypt2 = openssl_encrypt("123", 'AES-128-ECB', '0123456789ABCDEF');

$decrypt1 = openssl_decrypt($encrypt1, 'AES-128-ECB', '0123456789ABCDEF', 1);
//echo "$encrypt1\r\n";
//echo $encrypt2;