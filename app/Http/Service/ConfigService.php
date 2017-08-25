<?php
/**
 * Created by PhpStorm.
 * User: admin_
 * Date: 2017/8/9
 * Time: 19:58
 */

namespace App\Http\Service;

use App\Models\ConfigModel;

class ConfigService extends BaseService {



	public function __construct() {

		$this->model = new ConfigModel();
	}

	public function create( $name=null, $value=null, $is_use=null) {

		$result = $this->model->createParams( $name, $value, $is_use);
		return $result;
	}

	/**
	 * 编辑
	 */
	public function edit($id, $name=null, $value=null, $is_use=null) {

		$this->model = ConfigModel::find($id);
		if (!is_null($this->model)) {
			$result = $this->model->edit($id, $name, $value, $is_use);
			return $result;

		} else {
			$this->model = new ConfigModel();
			$this->message = '该数据不存在';
			return false;
		}
	}

	public function remove($id) {
		$result = $this->model->remove($id);
		return $result;
	}

	public function shareGlobalConfig() {

	    $result = null;

	    $result = $this->model->where('is_use', 1)->get()->toArray();
         

        \View::share('GConfig', $result);  
         
    }

}