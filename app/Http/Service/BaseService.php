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

	protected $orderColumn = 'id';
	protected $orderMethod = 'desc';

	protected $prevPageListQuery = null;

	protected $totalRows = 0;
	public function getTotalRows() {
		return $this->totalRows;
	}

	protected function setTotalRows($number) {
		$this->totalRows = $number;
	}

	/**
	 * @return mixed
	 */
	public function getPrevPageListQuery() {
		if (is_null($this->prevPageListQuery)) {

			$model = $this->model;
			$this->orderColumn = is_null($this->orderColumn) ? 'id' : $this->orderColumn;
			$this->orderMethod = is_null($this->orderMethod) ? 'desc' : $this->orderMethod;
			$this->prevPageListQuery = $model->orderBy($this->orderColumn, $this->orderMethod);
		}
		return $this->prevPageListQuery;
	}

	/**
	 * @param mixed $prevPageListQuery
	 */
	public function setPrevPageListQuery($prevPageListQuery) {
		$this->prevPageListQuery = $prevPageListQuery;
	}

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
		$orderColumn = !is_null($orderColumn) ? $orderColumn : 'id';
		$orderMethod = !is_null($orderMethod) ? $orderMethod : 'desc';

		$this->orderColumn = $orderColumn;
		$this->orderMethod = $orderMethod;

		$skip = ($page - 1) * $amount;

		$query = $this->getPrevPageListQuery();

		if (!is_null($search)) {
			$query->where('title', 'like', "%{$search}%");
		}

		if (!is_null($params)) {
			if (is_array($params)) {
				if (key_exists('type_id', $params)) {
					if (is_array($params['type_id'])) {

						$query->whereIn('type_id', $params['type_id']);
					} else {

						$query->where('type_id', $params['type_id']);
					}
				}
				if (key_exists('created_at', $params) && is_array($params['created_at'])) {

					$query->whereBetween('created_at', $params['created_at']);
				}
				if (key_exists('is_index', $params) && !is_null($params['is_index'])) {
					$query->where('is_index', $params['is_index']);
				}

			}
		}

		$totalQuery = clone $query;
		$totalRowNumber = $totalQuery->count();
		$this->setTotalRows($totalRowNumber);

		if ($totalRowNumber > 0 && ceil($totalRowNumber / $amount) < $page) {
			$skip = (ceil($totalRowNumber / $amount) - 1) * $amount;
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