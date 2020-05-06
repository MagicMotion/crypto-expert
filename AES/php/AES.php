
<?php


$encrypt1 = openssl_encrypt("123", 'AES-128-ECB', '0123456789ABCDEF', OPENSSL_RAW_DATA);

$encrypt2 = openssl_encrypt("123", 'AES-128-ECB', '0123456789ABCDEF');

$decrypt1 = openssl_decrypt($encrypt1, 'AES-128-ECB', '0123456789ABCDEF', 1);
//echo "$encrypt1\r\n";
//echo $encrypt2;
var_dump($decrypt1);

class AES
{
    const KEY = '0123456789ABCDEF';


    /**
     * openssl_encrypt 加密参数 options
     * 0: 返回值将会使用 base64
     * OPENSSL_RAW_DATA: 返回值使用原始字节
     */

    /**
     * @param $data
     * @return string
     */
    public static function encrypt($data)
    {
        return openssl_encrypt($data, 'AES-128-ECB', self::KEY);
    }


    /**
     * openssl_decrypt 加密参数 options
     * 0: 默认数据是 base64 形式
     * 1: 默认数据是原始格式
     */
    public static function decrypt($data)
    {
        return openssl_decrypt($data, 'AES-128-ECB', self::KEY);
    }
}