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

		$query->whereIn('type_id', [24,25,26,36]);
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

		$typeName = $type->name;
		if( in_array($typeName, ['送检指南', '检测能力'])) {
            $service = new ArticleService();

            $articleList = $service->getPageList(1, 1000000,null,'updated_at','desc', ['type_id' => $type['id']]);
            $articleList = $articleList->toArray();
            if (is_array($articleList) && count($articleList)) {
                $article = $articleList[0];

                $url = 'detail/' . $article['id'];
                return redirect($url);
            }
        }

		if (is_null($type)) {
			abort(404, '类别不存在');
			return;
		}

		\View::share('current_type', $type);
		\View::share('root_type_id', $this->getRootId($id));

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

		if($model && $model->articleType) {
		    \View::share('current_type', $model->articleType);
            \View::share('root_type_id', $this->getRootId($model->articleType->id));
        }


		return view('article.detail', ['id' => $id, 'model' => $model]);
	}



	public function getRootId($id){
        $typeArr = ['关于我们', '服务指南', '新闻资讯', '检测能力', '网上业务', '联系我们'];
        $rootId = $id;
        foreach ($typeArr as $typeName) {

            $types = getTypeList($typeName, 'name');
            if (count($types)) {
                foreach ($types as $item) {
                    if ($item['id'] == $rootId) {
                        $rootId = $types[0]['id'];
                    }

                }
            }
        }

        return $rootId;
    }

<<<<<<< HEAD
    public function map(){
        return \View::make('article.map');
    }
=======
>>>>>>> 37a1ddbaab5c3ef424a746d120dd74a8916330c1
}
