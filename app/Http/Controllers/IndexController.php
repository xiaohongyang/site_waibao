<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Http\Service\ArticleService;
use App\Http\Service\ArticleTypeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;

//class IndexController extends BaseController
class IndexController extends BaseController {

	public function index(Request $request) {

		
		$this->renderIndex();
		return view('front.index');
	}

	protected function renderIndex() {

        $typeService = new ArticleTypeService();


        $types = $typeService->getModel()->where('is_index',1)->get()->toArray();
		$renderData = [];
 		foreach ($types as $key => $item) {
 		 	$typeId = $item['id'];
 		 	$typeName = $item['name'];
            $articleService = new ArticleService();
            $articleList = $articleService->getData($typeId);

            $data = [
                'id' => $typeId,
                'name' => $typeName,
                'article_list' => $articleList
            ];
 		 	$renderData[] = $data;
 		} 
		\view()->share('channels', $renderData);
	}

	public function search(Request $reuqest) {

		return view('front.search');
	}

	public function route(Request $request) {

		//if the incoming request is targeted at http://domain.com/foo/bar, the path method will return foo/bar:
		//		dump($request->path());
		//		dump($request->is('rout*'));
		//		dump($request->url());
		//		dump($request->fullUrl());
		//		//return the request method , like 'get'、'post' ...
		//		dump($request->method());
		//		dump($request->get('a'));
		//		dump($request->input('a'));
		//		dump($request->all());
		//		dump($request->input('ab','a'));
		//		dump($request->only('a','c'));
		//		dump($request->except('a'));
		//		dump($request->intersect(['a','b']));
		return view('route');
	}

	/**
	 * get current action method name
	 * @author 258082291@qq.com
	 * @return mixed
	 */
	protected function getCurrentActionName() {
		$currentRoute = Route::getCurrentRoute()->getActionName();
		list(, $action) = explode('@', $currentRoute);

		return $action;
	}

	/**
	 * get current controller name
	 * @return mixed
	 */
	protected function getCurrentControllerName() {
		$currentRoute = Route::getCurrentRoute()->getActionName();
		list($controller) = explode('@', $currentRoute);
		$controllerArr = explode('\\', $controller);
		$controllerName = array_pop($controllerArr);
		return $controllerName;
	}

	/**
	 * get current namespace
	 */
	protected function getCurrentNameSpace() {
		$currentRoute = Route::getCurrentRoute()->action['namespace'];
		echo $currentRoute;
	}

	public function test() {

		echo 33;exit;
		if (App::environment('local')) {
			echo 'is local';
		} else if (App::environment('develop')) {

			echo 'is develop';
		} else {
			echo 'is not local';
		}

		echo env('app.timezone');
		echo config('app.timezone');

		echo '<br/>';
		echo date('Y-m-d H:i:s', time());

		echo 3;
	}

	public function storage() {

		echo asset('storage/test.txt');
		\Storage::disk('local')->put('test.txt', "Contents");
		echo \Storage::disk('local')->get('test.txt');
		return view('index.storage');
	}

	public function storageUpload(Request $request) {

		$path = \Storage::putFileAs("headpic", $request->file('headpic'), 'test.jpg');
		$path = \Storage::putFile("headpic", $request->file('headpic'));
		echo $path;
		$path = $request->file('headpic')->storeAs('headpic', '001.jpg');
		echo $path;
		\Storage::setVisibility('headpic/001.jpg', 'public');

		if (\Storage::exists('headpic/ltIY6ALVzWv9MXZz1WUE3Z1CIfgA7oTH0pvdEhDU.jpeg')) {
			\Storage::delete('headpic/ltIY6ALVzWv9MXZz1WUE3Z1CIfgA7oTH0pvdEhDU.jpeg');
		}
		if (!\Storage::exists('new_directory')) {
			\Storage::makeDirectory('new_directory');
		}
		exit;

	}

	public function uploadimage() {
		return view('index.uploadimage');
	}

	public function douploadimage(Request $request) {

		//获取上传文件和文件信息

		$directoryHeadPic = env('HEAD_PIC_FILE_PATH');
		$articleThumbFilePath = env('ARTICLE_THUMB_FILE_PATH');
		//图片保存路径
		$directoryArray = [$directoryHeadPic, $articleThumbFilePath];
		$directory = implode(',', $directoryArray);

		$rules = ['thumb' => 'required|max:101', 'directory' => 'required|in:' . $directory];
		$validate = \Validator::make($request->all(), $rules);
		$file = Input::file('thumb');

		$result = ['result' => false, 'errors' => []];
		//验证文件信息
		if (!is_null($file) && !$validate->fails()) {

			//保存文件
			$extension = $file->getClientOriginalExtension();
			$filePath = public_path() . DIRECTORY_SEPARATOR . $request->get('directory') . DIRECTORY_SEPARATOR;
			$fileName = date('YmdHis', time());
			$fileName .= '.' . $extension;
			$file->move($filePath, $fileName);
			$result['result'] = true;
			$result['file'] = $request->get('directory') . DIRECTORY_SEPARATOR . $fileName;
		} else {

			$result['errors'] = $validate->errors();
		}
		return $result;
	}

}
