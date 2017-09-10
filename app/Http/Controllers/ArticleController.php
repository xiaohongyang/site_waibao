<?php

namespace App\Http\Controllers;

use App\Http\Service\ArticleService;
use App\Http\Service\ArticleTypeService;
use App\Models\ArticleModel;
use App\Models\ArticleTypeModel;
use Illuminate\Http\Request;

class ArticleController extends BaseController {
	//

	private $article;

	public function __construct(ArticleModel $article) {
		parent::__construct();
		$this->article = $article;
	}

	public function search(Request $request) {

		\DB::enableQueryLog();
		$articleService = new ArticleService();
		$query = $articleService->getPrevPageListQuery();
		$key = $request->get('key');
		if (!is_null($key)) {
			$query->where('title', 'like', "%{$key}%");
		}

		$query->where('type_id', 25);
		$articleService->setPrevPageListQuery($query);
		$pageData = $articleService->getPageList(1, 9999, $key, 'updated_at', 'desc');
		$queries = \DB::getQueryLog();
		print_r($queries);
		//sreturn view('article.survey', ['id' => $id, 'listData' => $pageData]);
		return view('article.search', ['id' => 16, 'listData' => $pageData]);
	}

	public function list(Request $request, $id) {
		if (is_null($id)) {
			abort(404, '类别参数错误');
			return;
		}

		$typeService = new ArticleTypeService();
		$type = $typeService->getById($id);
		if (is_null($type)) {
			abort(404, '类别不存在');
			return;
		}
		switch ($type->show_type) {
		case ArticleTypeModel::SHOW_TYPE_ARTICLE:
			return $this->renderArticles($id);
			break;
		case ArticleTypeModel::SHOW_TYPE_NO_THUMB_ARTICLE:
			return $this->renderNoThumbArticles($id);
			break;
		case ArticleTypeModel::SHOW_TYPE_IMAGE:
			return $this->renderImages($id);
			break;
		case ArticleTypeModel::SHOW_TYPE_SINGLE_PAGE:
			return $this->renderSinglePage($id);
			break;

		case ArticleTypeModel::SHOW_TYPE_UPLOAD:
			return $this->renderDownFile($id);
			break;

		case ArticleTypeModel::SHOW_TYPE_GUEST_BOOK:
			return $this->renderGuestBook($id);
			break;

		case ArticleTypeModel::SHOW_TYPE_SURVEY:
			return $this->renderSurvey($id);
			break;
		}
	}

	protected function renderArticles($id) {

		$articleService = new ArticleService();
		$query = $articleService->getPrevPageListQuery();
		$query->where('type_id', $id);
		$articleService->setPrevPageListQuery($query);
		$pageData = $articleService->getPageList(1, 9999, null, 'updated_at', 'desc');
		return view('article.list', ['id' => $id, 'listData' => $pageData]);
	}

	protected function renderNoThumbArticles($id) {

		$articleService = new ArticleService();
		$query = $articleService->getPrevPageListQuery();
		$query->where('type_id', $id);
		$articleService->setPrevPageListQuery($query);
		$pageData = $articleService->getPageList(1, 9999, null, 'updated_at', 'desc');
		return view('article.no-thumb-list', ['id' => $id, 'listData' => $pageData]);
	}

	//单页
	protected function renderSinglePage($id) {
		$articleService = new ArticleService();
		$query = $articleService->getPrevPageListQuery();
		$query->where('type_id', $id);
		$articleService->setPrevPageListQuery($query);
		$pageData = $articleService->getPageList(1, 9999, null, 'updated_at', 'desc');
		return view('article.single-page', ['id' => $id, 'listData' => $pageData]);
	}

	//图片列表
	protected function renderImages($id) {

		$articleService = new ArticleService();
		$query = $articleService->getPrevPageListQuery();
		$query->where('type_id', $id);
		$articleService->setPrevPageListQuery($query);
		$pageData = $articleService->getPageList(1, 9999, null, 'updated_at', 'desc');
		return view('article.image-list', ['id' => $id, 'listData' => $pageData]);
	}

	//文件下载
	protected function renderDownFile($id) {

		$articleService = new ArticleService();
		$query = $articleService->getPrevPageListQuery();
		$query->where('type_id', $id);
		$articleService->setPrevPageListQuery($query);
		$pageData = $articleService->getPageList(1, 9999, null, 'updated_at', 'desc');
		return view('article.down-file', ['id' => $id, 'listData' => $pageData]);
	}

	//留言本
	protected function renderGuestBook($id) {

		$articleService = new ArticleService();
		$query = $articleService->getPrevPageListQuery();
		$query->where('type_id', $id);
		$articleService->setPrevPageListQuery($query);
		$pageData = $articleService->getPageList(1, 9999, null, 'updated_at', 'desc');
		return view('article.guest-book', ['id' => $id, 'listData' => $pageData]);
	}

	//调查表
	protected function renderSurvey($id) {

		$articleService = new ArticleService();
		$query = $articleService->getPrevPageListQuery();
		$query->where('type_id', $id);
		$articleService->setPrevPageListQuery($query);
		$pageData = $articleService->getPageList(1, 9999, null, 'updated_at', 'desc');
		return view('article.survey', ['id' => $id, 'listData' => $pageData]);
	}

	public function detail($id) {

		if (is_null($id) || !is_numeric($id)) {
			abort(404, 'id参数错误');
		}
		$articleService = new ArticleService();
		$model = $articleService->getById($id);

		return view('article.detail', ['id' => $id, 'model' => $model]);
	}

}
