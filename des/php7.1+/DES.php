
<?php
class DES
{
    public static function encrypt($data, $key)
    {
        return openssl_encrypt($data, 'DES-ECB', $key, OPENSSL_RAW_DATA);
    }

    public static function decrypt($data, $key)
    {