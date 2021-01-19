
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
