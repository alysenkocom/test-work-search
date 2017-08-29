<?php
/**
 * Created by PhpStorm.
 * User: alysenko
 */

namespace application\core;

/**
 * Class View
 *
 * @package application\core
 */
class View extends \Smarty {

	/**
	 * @var string
	 */
	public $path = 'templates/';

	/**
	 * @param array 	$data
	 * @param string 	$path
	 */
	public function fetchData(array $data, $path = 'main/content') {
		/** header */
		$this->display($this->path .'header.tpl');

		/** assign data */
		foreach ( $data as $key => $value ) {
			$this->assign($key, $value);
		}

		/** display content data */
		$this->display($this->path . $path . '.tpl');

		/** display global scripts */
		$this->display($this->path . 'js.tpl');

		/** display js scripts */
		$this->display($this->path . $path . '.js.tpl');

		/** footer */
		$this->display($this->path .'footer.tpl');
	}

}