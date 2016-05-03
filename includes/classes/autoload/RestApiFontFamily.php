<?php

use
	GoodSend\Catalog\FontFamily\Collection
		as FontFamilyCol
;

class RestApiFontFamily extends RestApi {

	public function get(){
		$col = new FontFamilyCol();
		// filter with default status 1
		$params['filters']['status'] = 1;
		$this->applyFilters($col, $params);
		$this->applySortBy($col, $params);
		return $this->getReturn($col, $params);
	}
}

