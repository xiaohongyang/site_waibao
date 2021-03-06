<?php
/**
 * Created by PhpStorm.
 * User: admin_
 * Date: 2017/7/28
 * Time: 6:11
 */

namespace App\Http\Service;

Abstract Class BaseService {

	protected $message;
	protected $model;

	protected function setMessage($message) {
		$this->message = $message;
	}

	/*public function getMessage(){
		        return $this->message;
	*/

	public function getMessage() {

		return $this->model->getCreateValidator() && $this->model->getCreateValidator()->getMessageBag() ?
		$this->model->getCreateValidator()->getMessageBag() :
		($this->model->message ?: $this->message);
	}

	public function getModel() {
		return $this->model;
	}

	public function getById($id) {
		$model = $this->model;

		$result = $model->find($id);
		if (is_null($result)) {
			$this->message = "数据不存在";
		}

		return $result;
	}

	public function getPageList($page = null, $amount = null, $search = null, $orderColumn = null, $orderMethod = null, $params = null) {

		$page = !is_null($page) ? $page : 1;
		$amount = !is_null($amount) ? $amount : 10;
		$search = !is_null($search) ? $search : '';
		$orderColumn = !is_null($orderColumn) ? $orderColumn : 'id';
		$orderMethod = !is_null($orderMethod) ? $orderMethod : 'desc';

		$model = $this->model;
		$skip = ($page - 1) * $amount;

		$query = $model->orderBy($orderColumn, $orderMethod);

		if (!is_null($params)) {
			if (is_array($params)) {
				if (key_exists('type_id', $params)) {
					$query->where('type_id', $params['type_id']);
				}
			}
		}

		$query
			->offset($skip)
			->limit($amount);

		if (!is_null($params)) {
			if (is_array($params)) {
				if (key_exists('relation', $params)) {
					$query->with($params['relation']);
				}
			}
		}
		$result = $query->get();
		return $result;

	}

}