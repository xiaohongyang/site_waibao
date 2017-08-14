<?php
/**
 * Created by PhpStorm.
 * User: admin_
 * Date: 2017/8/9
 * Time: 19:58
 */

namespace App\Http\Service;

use App\Models\ArticleModel;

class ArticleService extends BaseService {

	public function __construct() {

		$this->model = new ArticleModel();
	}

	public function create($title, $thumb = null, $typeId = null, $content = null) {

		$result = $this->model->createParams($title, $thumb, $typeId, $content);
		return $result;
	}

	/**
	 * 编辑
	 */
	public function edit($id, $title, $thumb = null, $typeId = null, $content = null) {

		$this->model = $this->model::find($id);
		if (!is_null($this->model)) {
			$result = $this->model->edit($id, $title, $thumb, $typeId, $content);
			return $result;

		} else {
			$this->model = new ArticleModel();
			$this->message = '该数据不存在';
			return false;
		}
	}

	public function remove($id) {
		$result = $this->model->remove($id);
		return $result;
	}

}