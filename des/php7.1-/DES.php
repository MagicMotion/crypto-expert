
<?php

class DES
{
    public static function encrypt($data, $key)
    {
        $size = mcrypt_get_block_size(MCRYPT_DES, MCRYPT_MODE_ECB);
        $data = self::pkcs7Padding($data, $size);
        $td = @mcrypt_module_open(MCRYPT_DES, '', MCRYPT_MODE_ECB, '');
        $key = substr($key, 0, mcrypt_enc_get_key_size($td));
        @mcrypt_generic_init($td, $key, '');
        $data = mcrypt_generic($td, $data);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        return $data;
    }

    public static function decrypt($data, $key)
    {
        $size = mcrypt_get_block_size(MCRYPT_DES, MCRYPT_MODE_ECB);
        $td = mcrypt_module_open(MCRYPT_DES, '', MCRYPT_MODE_ECB, '');
        $key = substr($key, 0, mcrypt_enc_get_key_size($td));
        mcrypt_generic_init($td, $key, '');