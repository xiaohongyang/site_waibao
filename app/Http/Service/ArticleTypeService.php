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

	public function create($name, $uid, $pid = null, $content = null, $thumb = null, $sort = null, $show_type = null, $is_index = null) {

		$result = $this->model->createParams($name, $uid, $pid, $content, $thumb, $sort, $show_type, $is_index);
		return $result;
	}

	/**
	 * 编辑
	 */
	public function edit($id, $name, $uid, $pid = null, $content = null, $thumb = null, $sort = null, $show_type = null, $is_index = null) {

		$this->model = ArticleTypeModel::find($id);
		if (!is_null($this->model)) {
			$result = $this->model->edit($id, $name, $uid, $pid, $content, $thumb, $sort, $show_type, $is_index);
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

		$tree = TreeHelper::getInstance()->generateTree($result, 'pid', $pid);

		return $tree;
	}

    /**
     * 获取类别数组
     * @param $pid 父id
     * @param string $orderColumn
     * @param string $orderMethod
     * @return array
     */
	public function getList($pid, $orderColumn = 'sort', $orderMethod = 'desc') {

	    $tree = $this->getTree($pid, $orderColumn, $orderMethod);
	    $list = TreeHelper::getInstance()->conveTreeToArray($tree);
        return $list;
    }

    /**
     * 获取id数组
     * @param $pid
     * @param string $orderColumn
     * @param string $orderMethod
     * @return array
     */
    public function getListIds($pid, $orderColumn='sort', $orderMethod='desc') {

	    $result = [];
	    $list = $this->getList($pid, $orderColumn, $orderMethod);
	    if(is_array($list)) {
	        foreach ($list as $item){
	            $result[] = $item['id'];
            }
        }
        return $result;
    }

    public function shareGlobalTypes($orderColumn='sort', $orderMethod='desc') {

        $query = $this->model->orderBy($orderColumn, $orderMethod)->get();
        $result = $query->where('id', '>', 0);
        $result = $result->toArray();

        \View::share('globalTypeList', $result);
    }

    public function shareGlobalTypesTree() {

	    $result = null;
	    $globalTypeList = \View::shared('globalTypeList',[]);
	    if(isset($globalTypeList) && is_array($globalTypeList) && count($globalTypeList)) {

	        $result = TreeHelper::getInstance()->generateTree($globalTypeList,'pid');
        }
 
        \View::share('globalTypeListTree', $result);
    }
}