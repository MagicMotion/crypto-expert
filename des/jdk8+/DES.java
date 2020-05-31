
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
        }
        if (password == null) {
            throw new NullPointerException("Parameter password cannot be null");
        }
        SecretKey key = SecretKeyFactory.getInstance("DES").generateSecret(new DESKeySpec(password.getBytes(StandardCharsets.UTF_8)));
        try {
            Cipher cipher = Cipher.getInstance("DES/ECB/PKCS5Padding");
            cipher.init(Cipher.ENCRYPT_MODE, key);
            byte[] bytes = cipher.doFinal(data.getBytes(StandardCharsets.UTF_8));
            return new String(Base64.getEncoder().encode(bytes));
        } catch (Exception e) {
            e.printStackTrace();
            return data;
        }
    }
