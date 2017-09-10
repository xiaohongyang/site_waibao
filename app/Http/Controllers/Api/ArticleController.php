<?php

namespace App\Http\Controllers\Api;

use App\Http\Service\ArticleService;
use App\Http\Service\ArticleTypeService;
use Illuminate\Http\Request;

class ArticleController extends BaseApiController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		$this->setJsonResult(0);

		$articleService = new ArticleService();
		$case = $request->get('case');

		switch ($case) {

		case 'page':
			$page = $request->get('page');
			$amount = $request->get('amount', 1000000);
			$search = $request->get('search');
			$type_id = $request->get('type_id');
			$is_index = $request->get('is_index');
			$list_year = $request->get('list_year');

			$type_id = $type_id == 0 ? null : $type_id;

			$orderColumn = $request->get('orderColumn', 'updated_at');
			$orderMethod = $request->get('orderMethod', 'desc');
			$params = [
				'relation' => 'articletype',
				'is_index' => $is_index,
			];

			if (!is_null($list_year) && preg_match('/[\d]/', $list_year)) {
				$beginTime = $list_year . '-01-01';
				$endTime = date('Y-01-01', strtotime('+1 year', strtotime($beginTime)));

				$params['created_at'] = ['between' => [$beginTime, $endTime]];
			}

			if (!is_null($type_id)) {
				$typeService = new ArticleTypeService();
				$typeIds = $typeService->getListIds($type_id);
				if (is_array($typeIds)) {

					$params['type_id'] = $typeIds;
				}
			} else if (!is_null($search)) {
				//不限购类别是搜索
				$params['type_id'] = [25, 26, 36, 29];
			}

			$result = $articleService->getPageList($page, $amount, $search, $orderColumn, $orderMethod, $params);
			$result = $result->toArray();
			if (is_array($result) && count($result)) {
				foreach ($result as $k => $value) {
					$result[$k]['description'] = strip_tags($value['content']);
					$result[$k]['thumb'] = '/' . $result[$k]['thumb'];
				}
			}
			$totalRows = $articleService->getTotalRows();
			$this->setTotalRows($totalRows);
			$this->setJsonResult(1, null, $result);
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
		return $this->getJsonResult();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$title = $request->get('title');
		$typeId = $request->get('type_id');
		$content = $request->get('content', '');
		$thumb = $request->get('thumb', '');
		$file = $request->get('file');
		$is_index = $request->get('is_index');
		$attach_file = $request->get('attach_file');
		$link = $request->get('link');
		$articleService = new ArticleService();

		$result = $articleService->create($title, $thumb, $typeId, $content, $file, $is_index, $attach_file, $link);

		$message = $result ? $articleService->getModel() : ($articleService->getMessage() ?: 'failed');
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
		$service = new ArticleService();
		$obj = $service->getById($id);
		if ($obj) {
			$this->setJsonResult(1, "查找数据成功", $obj);
		} else {
			$this->setJsonResult(0, $service->getMessage());
		}

		return $this->getJsonResult();
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

		$title = $request->get('title');
		$typeId = $request->get('type_id');
		$content = $request->get('content');
		$thumb = $request->get('thumb');
		$file = $request->get('file');
		$is_index = $request->get('is_index');
		$attach_file = $request->get('attach_file');
		$link = $request->get('link');
		$articleService = new ArticleService();

		$result = $articleService->edit($id, $title, $thumb, $typeId, $content, $file, $is_index, $attach_file, $link);

		$message = $result ? '更新成功' : ($articleService->getMessage() ?: '更新失败');
		$resultData = $result ? $articleService->getModel() : [];
		$this->setJsonResult($result ? 1 : 0, $message, $resultData);
		return $this->getJsonResult();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id, Request $request) {
		//
		$articleService = new ArticleService();

		$type = $request->get('type');
		$ids = $request->get('ids');

		if (!is_null($type) && $type == 'batch_delete') {

			$articleService->getModel()->whereIn('id', explode(',', $ids))->delete();
			$this->setJsonResult(1, '删除成功');

		} else {

			$result = $articleService->remove($id);
			$message = $result ? '删除成功' : ($articleService->getMessage() ?: '数据不存在或者已被删除');

			$this->setJsonResult($result ? 1 : 0, $message);

		}
		return $this->getJsonResult();
	}
}
