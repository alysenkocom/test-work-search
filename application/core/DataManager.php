<?php
/**
 * Created by PhpStorm.
 * User: alysenko
 */

namespace application\core;

/**
 * Class DataManager
 *
 * @package application\core
 */
class DataManager {

	/**
	 * @var \mysqli
	 */
	public $dataManager;

	/**
	 * DataManager constructor.
	 */
	public function __construct() {
		$dbConfig = Config::get('db');

		$this->dataManager = new \mysqli(
			$dbConfig['host'],
			$dbConfig['u_name'],
			$dbConfig['u_pass'],
			$dbConfig['db_name']
		);
		$this->dataManager->set_charset($dbConfig['charset']);
	}

	/**
	 * @param string 	$sql
	 *
	 * @return array
	 */
	public function select($sql) {
		$return = [];
		$result = $this->dataManager->query($sql);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$return[] = $row;
			}
		}

		return $return;
	}

}