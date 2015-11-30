<?php
namespace Wx\Wxutils;
/**
 * 字符串相关的工具类
 * @author xiawei
 */
class StringUtil {
	/**
	 * 对一个字符串进行可逆加密操作
	 * @param string $str 要加密的字符串
	 * @param string $key 用于加密的Key
	 * @return string 加密后的字符串
	 */
	public static function encryStr($str, $key='5BAB6FAC-4283-4ebe-AE97-3CBCA9CA70B0') {
		return base64_encode(mcrypt_encrypt(MCRYPT_BLOWFISH, $key, $str, MCRYPT_MODE_ECB));
	}
	
	/**
	 * 对一个字符串进行解密操作
	 * @param string $str 要解密的字符串
	 * @param string $key 用于解密的key
	 * @return string 返回解密之后的字符串
	 */
	public static function decryStr($str,$key='5BAB6FAC-4283-4ebe-AE97-3CBCA9CA70B0') {
		return trim(mcrypt_decrypt(MCRYPT_BLOWFISH, $key, base64_decode($str), MCRYPT_MODE_ECB));
	}
	
	/**
	 * 判断是否是邮件格式是否正确
	 * @param string $email
	 * @return boolean 正确返回true,否则返回false
	 */
	public static function isEmail($email) {
		$pattern="/([a-z0-9]*[-_.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[.][a-z]{2,3}([.][a-z]{2})?/i";
		if(\preg_match($pattern, $email)){
			return true;
		}
		return false;
	}
	
	/**
	 * 判断手机号码是否正确
	 * @param string $phone 要验证的手机号码
	 * @return boolean 手机号码正确返回true,否则返回false
	 */
	public static function isMobilePhone($phone) {
		if(\preg_match("/^13[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|189[0-9]{8}$/",$phone)) {
			return true;
		}
		return false;
	}
	
	/**
	 * 判断是否是正确的电话号码
	 * @param string $tel 要验证的电话号码
	 * @return boolean 电话号码验证成功返回true,否则返回false
	 */
	public static function isTel($tel) {
		if (\preg_match("/^([0-9]{3,4}-)?[0-9]{7,8}$/", $tel)) {
			return true;
		}
		return false;
	}
	
	
	/**
	 * 加密一个字符串
	 * @param string $str  要加密的字符串
	 * @param string $salt 加密盐
	 * @return string      加密后的字符串
	 */
	public static function encrypt($str, $salt = '5BAB6FAC-4283-4ebe-AE97-3CBCA9CA70B0') {
		return \sha1($str, \md5($salt));
	}
	
	/**
	 * 获取一个utf8字符串的长度
	 * @param string $str 要获取的字符串
	 * @return integer    返回的字符串的长度
	 */
	public static function getUtf8strLen($str) {
		return \mb_strlen($str, 'utf8');
	}
}