<?php
/**
 * Created by PhpStorm.
 * User: alysenko
 */

namespace application\models;

use application\core\Model;

/**
 * Class mainModel
 *
 * @package application\models
 */
class mainModel extends Model {

	/**
	 * get brands data
	 *
	 * @return array
	 */
	public function getBrands() {
		$result = $this->select('select * from `brands`');
		return $result;
	}

	/**
	 * get products
	 *
	 * @param array $searchData
	 *
	 * @return array
	 */
	public function getProducts(array $searchData=[]):array {
		$sqlSelect = 'select `products`.name as product_name, `products`.img as product_img, `brands`.name as brand_name,
					(select GROUP_CONCAT(sizes.`name` SEPARATOR \', \') as fff from sizes inner join sizes_to_products as stp on stp.`size_id`=sizes.`id` where stp.product_id=`products`.id) as size_name
					
					
					from `products` 
					
					inner join `brands` on `brands`.id=`products`.brand_id 
					inner join `types` on `types`.id=`products`.type_id
					inner join `search` on `search`.product_id=`products`.id
					
					';

		$havingData = '';
		if (! empty($searchData)) {
			$whereData = [];
			if (isset($searchData['brand'])) {
				$whereData[] = ' search.brand_id=' . $searchData['brand'] . ' ';
			}
			if (isset($searchData['text'])) {
				$textData = explode(' ',$searchData['text']);
				foreach ($textData as $word) {
					$whereData[] = ' search.product_data like "%' . $this->dataManager->escape_string($word) . '%" ';
				}
			}
			if (isset($searchData['size']) && isset($searchData['size']['selected'])) {
				$havingData = ' having `size_name` like "%' . $this->getSizeNameById($searchData['size']['selected']) . '%" ';
			}


			if (! empty($whereData)) {
				$sqlSelect .= ' where ' . implode(' AND ', $whereData);
			}
		}

		$sqlSelect .= $havingData . ' order by `products`.`id` desc limit 6';

		$result = $this->select($sqlSelect);

		return $result;
	}

	/**
	 * @param integer $brandId
	 *
	 * @return array
	 */
	public function getSizesByBrandId($brandId) {
		$sqlSelect = 'select 
							sizes.*
						from brands
						inner join sizes_to_brands as stb on stb.brands_id=brands.id
						inner join sizes on sizes.id=stb.sizes_id
						where brands.id = ' . $brandId;

		return $this->select($sqlSelect);
	}

	/**
	 * @param $id
	 *
	 * @return string
	 */
	public function getSizeNameById($id) {
		$sqlSelect = 'select * from sizes where id=' . $id;
		$result = $this->select($sqlSelect);
		$result = reset ($result);

		return $result['name'];
	}

}