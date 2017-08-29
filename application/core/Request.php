<?php
/**
 * Created by PhpStorm.
 * User: alysenko
 */

namespace application\core;

/**
 * Class Request
 *
 * @package AL\application\core
 */
class Request {

	/**
	 * @var string
	 */
	private $controller;

	/**
	 * @var string
	 */
	private $method;

	/**
	 * @var array
	 */
	private $args;

	/**
	 * Request constructor.
	 */
	public function __construct() {
		$parts = explode('/',$_SERVER['REQUEST_URI']);
		$parts = array_filter($parts);

		$mainConfig = Config::get('main');

		$this->controller = ($value = array_shift($parts)) ? $value : $mainConfig['mainController'];
		$this->method = ($value = array_shift($parts)) ? $value : $mainConfig['mainAction'];

		$args = reset($parts);
		if (isset($args)) {
			parse_str(parse_url($args, PHP_URL_QUERY), $this->args);
		} else {
			$this->args = [];
		}
	}

	/**
	 * @return string
	 */
	public function getControllerName () {
		return $this->controller;
	}

	/**
	 * @return string
	 */
	public function getMethodName () {
		return $this->method;
	}

	/**
	 * @return array
	 */
	public function getArgs() {
		return $this->args;
	}

}