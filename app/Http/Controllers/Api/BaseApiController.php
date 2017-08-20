<?php
/**
 * Created by PhpStorm.
 * User: xiaohongyang
 * Date: 2017/6/8
 * Time: 9:01
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class BaseApiController extends Controller {

	protected $totalRows;
	public function setTotalRows($rowsNumber) {
		$this->totalRows = $rowsNumber;
	}
	public function getTotalRows() {
		return $this->totalRows;
	}

	protected $jsonResult = [
		'status' => 0,
		'message' => [],
		'data' => [],
		'id' => 0,
		'page' => [],
	];

	public function setJsonResult($status = null, $message = null, $data = null, $id = null) {
		if (!is_null($status)) {
			$this->jsonResult['status'] = $status;
		}
		if (!is_null($message)) {
			$this->jsonResult['message'] = $message;
		}
		if (!is_null($id)) {
			$this->jsonResult['id'] = $id;
		}
		if (!is_null($data)) {
			$this->jsonResult['data'] = $data;
		}
	}
	public function getJsonResult() {

		if (!is_null($this->getTotalRows())) {
			$this->jsonResult['page']['total'] = $this->getTotalRows();
		}

		return $this->jsonResult;
	}
}