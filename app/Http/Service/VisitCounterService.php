<?php
/**
 * Created by PhpStorm.
 * User: admin_
 * Date: 2017/8/9
 * Time: 19:58
 */

namespace App\Http\Service;

use App\Models\VisitCounterModel;

class VisitCounterService extends BaseService {

	public function __construct() {

		$this->model = new VisitCounterModel();
	}

	public function create($ip, $article_id=null, $type=null) {

		$result = $this->model->createParams($ip, $article_id, $type);
		return $result;
	}

	/**
	 * 编辑
	 */
	public function edit($id, $ip=null, $article_id=null, $type=null) {

		$this->model = VisitCounterModel::find($id);
		if (!is_null($this->model)) {
			$result = $this->model->edit($id, $ip, $article_id, $type);
			return $result;

		} else {
			$this->model = new VisitCounterModel();
			$this->message = '该数据不存在';
			return false;
		}
	}


	/*
	 * 记录网站访问
	 */
	public static function siteCounter(){

	    $service = new static();
	    $ip = $_SERVER['REMOTE_ADDR'];
	    $type = VisitCounterModel::TYPE_WEB_VISIT;
	    $date = date('Y-m-d', time());

        $model = VisitCounterModel::where('ip', $ip)->where('type', $type)->where('created_at', 'like', $date.'%')->first();
        if($model && count($model) > 0) {
            $service->edit($model->id, $ip, null, $type);
        } else {
            $service->create($ip, null, $type);
        }
    }

    public static function articleOrTypeCounter($id=null, $type= VisitCounterModel::TYPE_ARTICLE_VISIT){

	    if(is_null($id) || !is_numeric($id))
	        return false;

        $service = new static();
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d', time());
        $model = VisitCounterModel::where('ip', $ip)
            ->where('article_id', $id)
            ->where('type', $type)
            ->where('created_at', 'like', $date.'%')
            ->first();
        if($model && count($model) > 0) {
            $service->edit($model->id, $ip, $id, $type);
        } else {
            $service->create($ip, $id, $type);
        }
    }

    public static function getWebVisitCount(){

        $service = new static();
        $count = $service->getModel()->where('type', VisitCounterModel::TYPE_WEB_VISIT)->count();
        return $count;
    }

    public static function getTodayWebVisitCount(){

        $service = new static();
        $count = $service->getModel()->where('type', VisitCounterModel::TYPE_WEB_VISIT)
            ->where('created_at', 'like', date('Y-m-d ').'%')
            ->count();
        return $count;
    }

    public static function getWebDownCount(){

        $service = new static();
        $count = $service->getModel()->where('type', VisitCounterModel::TYPE_ARTICLE_DOWN)
            ->count();
        return $count;
    }

}