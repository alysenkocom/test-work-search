<?php
/**
 * Created by PhpStorm.
 * User: alysenko
 */

namespace application\core;

/**
 * Class Config
 *
 * @package application\core
 */
class Config {

	/**
	 * @var array
	 */
	static private $config = [];

	/**
	 * @param array $config
	 */
	static public function setGlobalConfig(array $config) {
		self::$config = $config;
	}

	/**
	 * @param $type
	 *
	 * @return mixed
	 * @throws \Exception
	 */
	static public function get($type) {
		if (isset(self::$config[$type])) {
			return self::$config[$type];
		} else {
			throw new \Exception ('cant find any config by $type::' . var_export($type, true));
		}
	}

}