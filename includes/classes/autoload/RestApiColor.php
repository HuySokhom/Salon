<?php

use
	GoodSend\Catalog\Color\Collection
		as ColorCol
;

class RestApiColor extends RestApi {

	public function get(){
		$col = new ColorCol();
		// filter with default status 1
		$params['filters']['status'] = 1;
		$this->applyFilters($col, $params);
		$this->applySortBy($col, $params);
		return $this->getReturn($col, $params);
	}
}
