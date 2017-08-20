<?php

namespace App\Http\Controllers\Api;

use App\Http\Helpers\TreeHelper;
use App\Http\Service\ConfigService;
use App\Models\ArticleTypeModel;
use App\Models\ConfigModel;
use Illuminate\Http\Request;

class ConfigController extends BaseApiController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {

		$this->setJsonResult(0);

		$configService = new ConfigService();
		$case = $request->get('case');

		switch ($case) {


		case 'page':
			$page = $request->get('page');
			$amount = $request->get('amount');
			$result = $configService->getPageList($page, $amount);
			$this->setJsonResult(1, null, $result);
			break;

		default:
			$result = ArticleTypeModel::all();
			$this->setJsonResult(1, null, $result);
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
		$name = $request->get('name');
		$value = $request->get('value');
		$is_use = $request->get('is_use', ConfigModel::USE_ENABLE);

		$configService = new ConfigService();
		$result = $configService->create($name, $value, $is_use);

		$message = $result ? $configService->getModel() : ($configService->getMessage() ?: 'failed');
		$this->setJsonResult($result ? 1 : 0, $message);
		return $this->getJsonResult();
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

	    $this->setJsonResult(0,'保存失败');
	    $type = $request->get('type');
        $listData = $request->get('listData');

	    $service = new ConfigService();

	    if($type == 'batch_update') {

	        if(!is_null($listData) && !is_array($listData)) {
                $listData = json_decode($listData);
            }
	        if(is_array($listData) && count($listData)) {
	            $result = false;
	            foreach ($listData as $row) {
                    $rs = $service->edit($row['id'], $row['name'],$row['value'],$row['is_use']);
                    if(!$result) {
                        $result = $rs;
                        $this->setJsonResult(1, '保存成功');
                    }
                }
            }
        }
        return $this->getJsonResult();

        $name = $request->get('name');
        $value = $request->get('value');
        $is_use = $request->get('is_use', ConfigModel::USE_ENABLE);

        $configService = new ConfigService();
		$result = $configService->edit($id, $name, $value, $is_use);

		$message = $result ? 'ok' : ($configService->getMessage() ?: 'failed');
		$resultData = $result ? $configService->getModel() : [];
		$this->setJsonResult($result ? 1 : 0, $message, $resultData);
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

		$configService = new ConfigService();

		$result = $configService->remove($id);
		$message = $result ? '删除成功' : ($configService->getMessage() ?: '数据不存在或者已被删除');
		$this->setJsonResult($result ? 1 : 0, $message);

		return $this->getJsonResult();
	}
}
