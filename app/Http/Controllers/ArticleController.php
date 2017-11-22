<?php

namespace App\Http\Controllers;

use App\Http\Service\ArticleService;
use App\Http\Service\ArticleTypeService;
use App\Http\Service\GuestBookService;
use App\Http\Service\VisitCounterService;
use App\Models\ArticleModel;
use App\Models\ArticleTypeModel;
use App\Models\VisitCounterModel;
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

		\View::share('current_type', $type);
		\View::share('current_type_id', $type->id);

		if (is_null($type)) {
			abort(404, '类别不存在');
			return;
		}
		VisitCounterService::articleOrTypeCounter($id, VisitCounterModel::TYPE_ARTICLE_TYPE_VISIT);

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
			return $this->renderArticles($id);
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

		$modelService = new GuestBookService();
		$list = $modelService->getModel()->orderByDesc('updated_at')->get();
		return view('article.guest-book', ['id' => $id, 'listData' => $list]);
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
		if(!is_null($model))
            VisitCounterService::articleOrTypeCounter($id, VisitCounterModel::TYPE_ARTICLE_VISIT);


		\View::share('current_type_id', $model->type_id);
        return view('article.detail', ['id' => $id, 'model' => $model]);
	}

	//文件下载
	public function down($id) {

		if (is_null($id) || !is_numeric($id) || !ArticleModel::where('id', $id)->first()) {
			abort(404, 'id参数错误');
		}

		VisitCounterService::articleOrTypeCounter($id, VisitCounterModel::TYPE_ARTICLE_DOWN);

		$articleService = new ArticleService();
		$model = $articleService->getById($id);

		$downFile = $model->attach_file;
		$downFile = public_path($downFile);
		$nameArray = explode('/', $downFile);
		$fileName = end($nameArray);
        $file=fopen($downFile,"r");


        $userBrowser = $_SERVER['HTTP_USER_AGENT'];
        if ( preg_match( '/MSIE/i', $userBrowser ) ) {
            $fileName = urlencode($fileName);
        }
        $fileName = iconv('UTF-8', 'GBK//IGNORE', $fileName);

        header("Content-Type: application/octet-stream");
        header("Accept-Ranges: bytes");
        header("Accept-Length: ".filesize($downFile));
        header("Content-Length: ".filesize($downFile));
        header("Content-Disposition: attachment; filename=$fileName");
        echo fread($file,filesize($downFile));
        fclose($file);
	}

}
