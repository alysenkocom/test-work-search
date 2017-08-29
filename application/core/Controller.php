<?php
/**
 * Created by PhpStorm.
 * User: alysenko
 */

namespace application\core;

/**
 * Class Controller
 *
 * @package application\core
 */
abstract class Controller {

	/**
	 * @var View
	 */
	public $view;

	/**
	 * @var Model
	 */
	public $model;

	/**
	 * Controller constructor.
	 * @param $model
	 */
	public function __construct($model) {
		$this->view = new View();
		$this->model = $model;
	}

}