<?php
namespace Wx\Wxutils;
/**
 * 和网络相关的常用方法的封装
 * @author xiawei
 */
class NetUtil {
	/**
	 * 检测某个ip地址的某个端口是否能连通并且被占用
	 * @param string $ip
	 * @param integer $port
	 * @return boolean 返回true表示被占用,返回false表示没有占用或者是出现异常
	 */
	public static function checkPortUsed($ip, $port) {
		$socket = \socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		\socket_set_nonblock($socket);
		\socket_connect($socket, $ip, $port);
		$r = array($socket);
		$w = array($socket);
		$e = array($socket);
		return \socket_select($r, $w, $e, 5) == 1;
	}
}