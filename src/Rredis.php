<?php
namespace Rredis;

/**
 * redis 缓存操作
 * 单例模式
 */
class Rredis {

	private $redis;
	private static $_instance;


	/**
	 * 初始化
	 * connect 脚本执行完，释放连接
	 * pconnect 脚本执行完，连接保持在php-fpm中
	 */
	private function __construct(array $params)
	{
        // 初始化参数
        $host = isset($params['host'])? $params['host']: '127.0.0.1';
        $port = isset($params['port'])? $params['port']: 6379;
        // 建立连接
		$this->redis = new \Redis();
		$this->redis->connect($host, $port);
	}


	private function __clone() {}


	// 获取对象
	public static function getInstance(array $params)
	{
		if (! self::$_instance instanceof self) {
			self::$_instance = new self($params);
		}
		return self::$_instance;
	}


	public function __call($method, $params)
	{
		return call_user_func_array(array($this->redis, $method), $params);
	}

}