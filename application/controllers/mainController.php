<?php
/**
 * Created by PhpStorm.
 * User: alysenko
 */

namespace application\controllers;

use application\core\Controller;
use application\models\mainModel;

/**
 * Class mainController
 *
 * @package application\controllers
 */
class mainController extends Controller {

	/**
	 * mainController constructor.
	 *
	 * @param mainModel $model
	 */
	public function __construct(mainModel $model) {
		parent::__construct($model);
	}

	/**
	 * @param array $searchArgs
	 *
	 * @return $this
	 */
	public function actionIndex (array $searchArgs = []) {
		$searchData = [];
		$brands = $this->model->getBrands();

		/** search */
		if (! empty($searchArgs)) {

			/** text */
			if (isset($searchArgs['text']) && !empty($searchArgs['text'])) {
				$searchData['text'] = preg_replace('![^\w\d\s]*!', '', $searchArgs['text']);
			}

			/** brand */
			if (isset($searchArgs['brand']) && !empty($searchArgs['brand'])) {
				$brandId = intval($searchArgs['brand']);
				if ($brandId > 0) {
					$searchData['brand'] = $brandId;

					$sizeData = $this->model->getSizesByBrandId($brandId);
					if (count($sizeData)>0) {
						$searchData['size'] = [ 'data' => $sizeData ];
					}
				}
			}

			/** size */
			if (isset($searchArgs['size']) && !empty($searchArgs['size'])) {
				$sizeId = intval($searchArgs['size']);
				if ($sizeId > 0) {
					$sizeData = $this->model->getSizesByBrandId($brandId);
					if (count($sizeData)>0) {
						$searchData['size'] = [
							'selected' => $sizeId,
							'data' => $sizeData
						];
					}
				}
			}
		}

		$lastProducts = $this->model->getProducts($searchData);

		$this->view->fetchData([
			'brands' => $brands,
			'lastProducts' => $lastProducts,
			'searchData' => $searchData,
		], 'main/content');

		return $this;
	}

	/**
	 * ajax method
	 */
	public function actionAjax () {
		$result = [ 'error' => true ];

		$ajax = filter_input(INPUT_POST, 'ajax', FILTER_VALIDATE_BOOLEAN);
		if ($ajax && ! is_null($ajax)) {
			$brandId = filter_input(INPUT_POST, 'brandId', FILTER_VALIDATE_INT);
			if ($brandId && ! is_null($brandId)) {
				$dbResult = $this->model->getSizesByBrandId($brandId);
				if (!empty($dbResult)) {
					$result['error'] = false;
					$result['result'] = $dbResult;
				}
			}
		}

		echo json_encode ( $result );
		exit();
	}

}