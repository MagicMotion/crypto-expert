
<?php


class DiscuzUtil
{

    const C_KEY_LENGTH = 4;

    /**
     * discuz 加密
     *
     * @param string $string 明文或密文字符串
     * @param string $key    密钥
     * @param int    $expiry 密文有效期,0代码永不过期(秒)
     * @return string
     */
    public static function encrypt($string, $key, $expiry = 0)
    {
        $key = md5($key);

        $key_a = md5(substr($key, 0, 16));
        $key_b = md5(substr($key, 16, 16));
        $key_c = substr(md5(microtime()), -self::C_KEY_LENGTH);
        $crypt_key = $key_a . md5($key_a . $key_c);
        $key_length = strlen($crypt_key);

        $string = sprintf('%010d', $expiry ? $expiry + time() : 0)
            . substr(md5($string . $key_b), 0, 16) . $string;
        $box = range(0, 255);

        $rndkey = array();
        for ($i = 0; $i <= 255; $i++) {
            $rndkey[$i] = ord($crypt_key[$i % $key_length]);
        }
        for ($j = $i = 0; $i < 256; $i++) {
            $j = ($j + $box[$i] + $rndkey[$i]) % 256;
            $tmp = $box[$i];
            $box[$i] = $box[$j];
            $box[$j] = $tmp;
        }
        $result = '';
        for ($a = $j = $i = 0; $i < strlen($string); $i++) {
            $a = ($a + 1) % 256;
            $j = ($j + $box[$a]) % 256;
            $tmp = $box[$a];
            $box[$a] = $box[$j];
            $box[$j] = $tmp;
            $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
        }
        return $key_c . str_replace('=', '', base64_encode($result));
    }

