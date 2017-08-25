<?php

namespace App\Http\Controllers\Api;

use App\Http\Helpers\TreeHelper;
use App\Http\Service\ArticleTypeService;
use App\Models\ArticleTypeModel;
use Illuminate\Http\Request;

class ArticleTypeController extends BaseApiController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {

		$this->setJsonResult(0);

		$articleTypeService = new ArticleTypeService();
		$case = $request->get('case');

		switch ($case) {
		case 'test':
			$tree = $articleTypeService->getTree(0);
			$rs = TreeHelper::getInstance()->isChildExist(3, $tree, 'id');
			$this->setJsonResult(1, null, $rs);

			break;

		case 'tree-list-row':
			$id = $request->get('id', 0);
			$tree = $articleTypeService->getTree(0);
			$rs = TreeHelper::getInstance()->conveTreeToArray($tree, 'id');
			$this->setJsonResult(1, null, $rs);

			break;

		case 'page':
			$page = $request->get('page');
			$amount = $request->get('amount');
			$result = $articleTypeService->getPageList($page, $amount);
			$this->setJsonResult(1, null, $result);
			break;
		case 'tree':
			$pid = $request->get('pid', 0);
			$result = $articleTypeService->getTree($pid);
			$this->setJsonResult(1, null, $result);
			break;
		case 'show_type_list':
			//显示类型 1:文章 2:图片 3:文件下载 4:单页 5:留言'
			$data = [
				['id' => 1, 'name' => '文章'],
				['id' => 6, 'name' => '无缩略图文章'],
				['id' => 2, 'name' => '图片'],
				['id' => 3, 'name' => '文件下载'],
				['id' => 4, 'name' => '单页'],
				['id' => 5, 'name' => '留言'],
				['id' => 7, 'name' => '调查表'],
			];
			$this->setJsonResult(1, 'ok', $data);
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
		$pid = $request->get('pid', 0);
		$content = $request->get('content', '');
		$thumb = $request->get('thumb', '');
		$sort = $request->get('sort');
		$show_type = $request->get('show_type');
		$is_index = $request->get('is_index');
		$articleTypeService = new ArticleTypeService();

		$result = $articleTypeService->create($name, \Auth::guard('api')->id(), $pid, $content, $thumb, $sort, $show_type, $is_index);

		$message = $result ? $articleTypeService->getModel() : ($articleTypeService->getMessage() ?: 'failed');
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

		$name = $request->get('name');
		$pid = $request->get('pid');
		$content = $request->get('content');
		$thumb = $request->get('thumb');
		$sort = $request->get('sort');
		$show_type = $request->get('show_type');
		$is_index = $request->get('is_index');
		$articleTypeService = new ArticleTypeService();

		$result = $articleTypeService->edit($id, $name, \Auth::guard('api')->id(), $pid, $content, $thumb, $sort, $show_type, $is_index);

		$message = $result ? 'ok' : ($articleTypeService->getMessage() ?: 'failed');
		$resultData = $result ? $articleTypeService->getModel() : [];
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

		$articleTypeService = new ArticleTypeService();

		$result = $articleTypeService->remove($id);
		$message = $result ? '删除成功' : ($articleTypeService->getMessage() ?: '类别不存在或者已被删除');
		$this->setJsonResult($result ? 1 : 0, $message);

		return $this->getJsonResult();
	}
}
