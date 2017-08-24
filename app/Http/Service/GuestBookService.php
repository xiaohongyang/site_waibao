<?php
/**
 * Created by PhpStorm.
 * User: admin_
 * Date: 2017/8/9
 * Time: 19:58
 */

namespace App\Http\Service;

use App\Models\GuestBookModel;

class GuestBookService extends BaseService {

	public function __construct() {

		$this->model = new GuestBookModel();
	}

	public function create($column01 = null, $column02 = null, $column03 = null, $column04 = null, $column05 = null, $column06 = null, $column07 = null, $column08 = null, $column09 = null, $column10 = null) {

		$result = $this->model->createParams($column01, $column02, $column03, $column04, $column05, $column06, $column07, $column08, $column09, $column10);
		return $result;
	}

	/**
	 * 编辑
	 */
	public function edit($id, $column01 = null, $column02 = null, $column03 = null, $column04 = null, $column05 = null, $column10 = null) {

		$this->model = GuestBookModel::find($id);
		if (!is_null($this->model)) {
			$result = $this->model->edit($id, $column01, $column02, $column03, $column04, $column05, $column10);
			return $result;

		} else {
			$this->model = new GuestBookModel();
			$this->message = '该数据不存在';
			return false;
		}
	}

	public function remove($id) {
		$result = $this->model->remove($id);
		return $result;
	}

}