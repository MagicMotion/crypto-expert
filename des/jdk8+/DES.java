
public class DES {

    /**
     * DES 加密字符串
     *
     * @param password 加密密码，长度不能够小于8位
     * @param data     待加密字符串
     * @return 加密后内容
     */
    public static String encrypt(String data, String password) throws NoSuchAlgorithmException, InvalidKeyException, InvalidKeySpecException {
        if (data == null) {
            throw new NullPointerException("Parameter data cannot be null");