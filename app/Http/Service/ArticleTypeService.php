<?php
/**
 * Created by PhpStorm.
 * User: admin_
 * Date: 2017/8/9
 * Time: 19:58
 */

namespace App\Http\Service;

use App\Http\Helpers\TreeHelper;
use App\Models\ArticleTypeModel;

class ArticleTypeService extends BaseService {

	public function getMessage() {

		return $this->model->getCreateValidator() && $this->model->getCreateValidator()->getMessageBag() ?
		$this->model->getCreateValidator()->getMessageBag() :
		($this->model->message ?: $this->message);
	}

	public function __construct() {

		$this->model = new ArticleTypeModel();
	}

	public function create($name, $uid, $pid = null, $content = null, $thumb = null, $sort = null) {

		$result = $this->model->createParams($name, $uid, $pid, $content, $thumb, $sort);
		return $result;
	}

	/**
	 * 编辑
	 */
	public function edit($id, $name, $uid, $pid = null, $content = null, $thumb = null, $sort = null) {

		$this->model = ArticleTypeModel::find($id);
		if (!is_null($this->model)) {
			$result = $this->model->edit($id, $name, $uid, $pid, $content, $thumb, $sort);
			return $result;

		} else {
			$this->model = new ArticleTypeModel();
			$this->message = '该类别数据不存在';
			return false;
		}
	}

	public function remove($id) {
		$result = $this->model->remove($id);
		return $result;
	}

	/**
	 * 获取类别树
	 * @param $pid  根类别id
	 * @return array
	 */
	public function getTree($pid, $orderColumn = 'sort', $orderMethod = 'desc') {

		$query = $this->model->orderBy($orderColumn, $orderMethod)->get();

		$result = $query->where('id', '>', 0);

		$result = $result->toArray();

		//$tree = $this->generateTree($result, 'pid', $pid);
		$tree = TreeHelper::getInstance()->generateTree($result, 'pid', $pid);

		return $tree;
	}

}