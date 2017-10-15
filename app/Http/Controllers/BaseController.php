<?php
/**
 * Created by PhpStorm.
 * User: admin_
 * Date: 2017/8/17
 * Time: 21:44
 */

namespace App\Http\Controllers;
use \App\Http\Service\ArticleTypeService;
use \App\Http\Service\ConfigService;
use \App\Http\Service\ArticleService;
use App\Http\Service\VisitCounterService;

class BaseController extends Controller {
	public function __construct() {

		$this->shareShareParams();

		VisitCounterService::siteCounter();
	}

	protected function shareShareParams() {

		$service = new ArticleTypeService();
		$service->shareGlobalTypes();
		$service->shareGlobalTypesTree();

		$configService = new ConfigService();
		$configService->shareGlobalConfig();

        //导航类别列表
		$this->setHeaderNav();

        //友情链接
        $this->setFriendList();

        //头部轮播
        $this->setHeaderSlide();
	}

	protected function setHeaderNav() {

		$service = new ArticleTypeService();
		$headerNav = $service->getHeaderNav();

		\View::share('header_nav', $headerNav);

	}
 

    protected function setFriendList(){

        $friendList = [];
        $service = new ArticleService();
        $type = getTypeItem('友情链接','name');
        if($type) {
            $friendList = $service->getModel()->where('type_id', $type['id'])->orderByDesc('updated_at')->get()->toArray();
        }
 
        \View::share('friend_list', $friendList);
    }

    protected function setHeaderSlide(){

        $typeId = env('SLIDE_ID');

        $service = new ArticleService();
        $list = $service->getModel()->where('type_id', $typeId)->orderByDesc('updated_at')->get()->toArray();

        \View::share('header_slide', $list);
    }

}