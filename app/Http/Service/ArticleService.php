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

	public function create($title, $thumb = null, $typeId = null, $content = null, $file = null, $is_index = null, $attach_file = null, $link = null) {

		$result = $this->model->createParams($title, $thumb, $typeId, $content, $file, $is_index, $attach_file, $link);
		return $result;
	}

	/**
	 * 编辑
	 */
	public function edit($id, $title, $thumb = null, $typeId = null, $content = null, $file = null, $is_index = null, $attach_file = null, $link = null) {

		$this->model = $this->model::find($id);
		if (!is_null($this->model)) {
			$result = $this->model->edit($id, $title, $thumb, $typeId, $content, $file, $is_index, $attach_file, $link);
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

	public function getData($type_id, $amount = 20, $is_index = 1) {

		$result = [];

		$orderColumn = 'updated_at';
		$orderMethod = 'desc';
		$params = [
			'relation' => 'articletype',
			'is_index' => $is_index,
		];
		if (!is_null($type_id)) {
			$params['type_id'] = $type_id;
		}
		$result = $this->getPageList(1, $amount, null, $orderColumn, $orderMethod, $params);
		$result = $result->toArray();
		if (is_array($result) && count($result)) {
			foreach ($result as $k => $value) {
				$result[$k]['description'] = strip_tags($value['content']);
				$result[$k]['thumb'] = '/' . $result[$k]['thumb'];
			}
		}

		return $result;
	}

}