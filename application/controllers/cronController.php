<?php
/**
 * Created by PhpStorm.
 * User: alysenko
 */

namespace application\controllers;

use application\core\Controller;
use application\models\cronModel;

/**
 * Class cronController
 *
 * @package application\controllers
 */
class cronController extends Controller {

	/**
	 * cronController constructor.
	 *
	 * @param cronModel $model
	 */
	public function __construct(cronModel $model) {
		parent::__construct($model);
	}

	/**
	 * @return $this
	 */
	public function actionIndex() {
		return $this;
	}

	/**
	 * cron: create search table
	 */
	public function actionGenerateSearchTable() {
		$time_start = microtime(true);

		echo 'inserted ' . $this->model->getProducts() . ' rows';
		echo "<br/><br/> total execution time in seconds: " . (microtime(true) - $time_start);
	}

}