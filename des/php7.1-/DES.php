
<?php

class DES
{
    public static function encrypt($data, $key)
    {
        $size = mcrypt_get_block_size(MCRYPT_DES, MCRYPT_MODE_ECB);
        $data = self::pkcs7Padding($data, $size);