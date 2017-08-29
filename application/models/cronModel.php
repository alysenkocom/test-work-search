<?php
/**
 * Created by PhpStorm.
 * User: alysenko
 */

namespace application\models;


use application\core\Model;

/**
 * Class cronModel
 *
 * @package application\models
 */
class cronModel extends Model {

	/**
	 * @return int
	 */
	public function getProducts() {
		$sqlInsert = 'insert into search (`product_id`,`brand_id`,`sizes_id`,`product_data`)
						select
						
							`products`.`id` as product_id,
							`brands`.id as brand_id,
							(select GROUP_CONCAT(sizes.`name` SEPARATOR \', \') as fff from sizes inner join sizes_to_products as stp on stp.`size_id`=sizes.`id` where stp.product_id=`products`.id) as sizes,
						
							CONCAT_WS(
								\' \',
								NULLIF(`brands`.name,\'\'),
								NULLIF(`types`.`name`,\'\'),
								NULLIF(`products`.name,\'\'),
								NULLIF((select GROUP_CONCAT(sizes.`name` SEPARATOR \' \') as fff from sizes inner join sizes_to_products as stp on stp.`size_id`=sizes.`id` where stp.product_id=`products`.id),\'\')
							) as field
						
						from `products`
						
						inner join `brands` on `brands`.id=`products`.brand_id
						inner join `types` on `types`.id=`products`.type_id
						
						order by `products`.`id` desc limit 6';

		$this->dataManager->query($sqlInsert);

		return $this->dataManager->affected_rows;
	}

}