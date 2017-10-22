<?php

namespace App\Http\Controllers\Api;

use App\Http\Service\GuestBookService;
use App\Models\ArticleTypeModel;
use Illuminate\Http\Request;

class GuestBookController extends BaseApiController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {

		$this->setJsonResult(0);

		$service = new GuestBookService();
		$case = $request->get('case');

		switch ($case) {

		case 'page':

			$page = $request->get('page');
			$amount = $request->get('amount', 1000000000000);
			$type_id = $request->get('type_id');
			$parent_id = $request->get('parent_id', 0);
			//$amount = null, $search = null, $orderColumn = null, $orderMethod = null, $params = null
            $service->setOrderColumn('created_at');
            $query = $service->getPrevPageListQuery();
            $query->where('parent_id', $parent_id);
            $service->setPrevPageListQuery($query);
            $result = $service->getPageList($page, $amount, null, null, null, [ 'relation' => ['reply'] ]);
			$this->setTotalRows($service->getTotalRows());
			$this->setJsonResult(1, null, $result);
			break;

        case 'verified' :

            $id = $request->get('id');
            $rs = $service->verified($id);
            $this->setJsonResult($rs ?1:0, "审核成功", $rs);
			break;

        case 'cancelVerified' :

            $id = $request->get('id');
            $rs = $service->unVerified($id);
            $this->setJsonResult($rs ?1:0, "取消审核成功", $rs);
			break;


        case 'reply' :

            $id = $request->get('id');
            $content = $request->get('content');

            \Log::info("content=>{$content}");
            $rs = $service->reply($id, $content);
            $this->setJsonResult($rs ?1:0, "回复成功", $rs);
            break;
		default:
			break;
		}

		return $this->getJsonResult();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
		return [
			'name',
			'pid',
		];
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$column01 = $request->get('column01');
		$column02 = $request->get('column02');
		$column03 = $request->get('column03');
		$column04 = $request->get('column04');
		$column05 = $request->get('column05');
		$column06 = $request->get('column06');
		$column07 = $request->get('column07');
		$column08 = $request->get('column08');
		$column09 = $request->get('column09');
		$column10 = $request->get('column10');
		$parent_id = $request->get('parent_id');

		$type_id = $request->get('type_id');
		$service = new GuestBookService();
		$service->getModel()->setTypeId($type_id);
		$service->getModel()->setParentId($parent_id);

		if(is_null($parent_id)) {

            $result = $service->create($column01, $column02, $column03, $column04, $column05, $column06, $column07, $column08, $column09, $column10);
            $message = $result ? $service->getModel() : ($service->getMessage() ?: 'failed');
            $this->setJsonResult($result ? 1 : 0, $message);
            return $this->getJsonResult();
        } else {

            $result = $service->reply($parent_id, $column10);
            $message = $result ? "回复成功" : ($service->getMessage() ?: 'failed');
            $this->setJsonResult($result ? 1 : 0, $message);
            return $this->getJsonResult();
        }



	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
		$result = [
			'status' => 0,
			'data' => [],
			'message' => [],
		];
		$model = ArticleTypeModel::find($id);
		if ($model) {
			$result['status'] = 1;
			$result['data'] = $model;
		}

		return $result;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
		echo $id;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {

		$this->setJsonResult(0, '保存失败');

		$column01 = $request->get('column01');
		$column02 = $request->get('column02');
		$column03 = $request->get('column03');
		$column04 = $request->get('column04');
		$column05 = $request->get('column05');
		$column10 = $request->get('column10');

		$service = new GuestBookService();
		$result = $service->edit($id, $column01, $column02, $column03, $column04, $column05, $column10);

		$message = $result ? $service->getModel() : ($service->getMessage() ?: 'failed');
		$this->setJsonResult($result ? 1 : 0, $message);
		return $this->getJsonResult();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//

		$service = new GuestBookService();

		$result = $service->remove($id);
		$message = $result ? '删除成功' : ($service->getMessage() ?: '数据不存在或者已被删除');
		$this->setJsonResult($result ? 1 : 0, $message);

		return $this->getJsonResult();
	}
}
