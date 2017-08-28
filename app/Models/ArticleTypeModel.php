<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleTypeModel extends BaseModel {

	use SoftDeletes;

	//展示类别  1:文章 2:图片 3:文件下载 4:单页 5:留言'
	const SHOW_TYPE_ARTICLE = 1; //文章类别
	const SHOW_TYPE_NO_THUMB_ARTICLE = 6; //无图片文章
	const SHOW_TYPE_IMAGE = 2; //图片类别
	const SHOW_TYPE_UPLOAD = 3; //文件下载
	const SHOW_TYPE_SINGLE_PAGE = 4; //单页
	const SHOW_TYPE_GUEST_BOOK = 5; //留言簿
	const SHOW_TYPE_SURVEY = 7; //调查
	//
	protected $table = 'article_type';

	public $fillable = ['name', 'uid', 'pid', 'content', 'thumb', 'sort', 'show_type', 'is_index'];

	public function createParams($name, $uid, $pid = null, $content = null, $thumb = null, $sort = null, $show_type = null, $is_index = null) {

		$pid = is_null($pid) ? 0 : $pid;
		$sort = is_null($sort) ? 0 : $sort;
		$content = is_null($content) ? 0 : $content;
		$thumb = is_null($thumb) ? '' : $thumb;
		$show_type = is_null($show_type) ? 1 : $show_type;
		$is_index = is_null($is_index) ? 0 : $is_index;


		$data = [
			'name' => $name,
			'uid' => $uid,
			'pid' => $pid,
			'content' => $content,
			'thumb' => $thumb,
			'sort' => $sort,
			'show_type' => $show_type,
		];

		$validator = \Validator::make($data, [
			'name' => ['required'],
			'uid' => ['required'],
			'pid' => ['required'],
		]);

		$this->setCreateValidator($validator);
		$result = $this->create($data);

		return $result;
	}

	public function edit($id, $name = null, $uid = null, $pid = null, $content = null, $thumb, $sort = null, $show_type = null, $is_index = null) {

		$data = [
			'id' => $id,
		];
		$rules = [
			'id' => [
				'required',
			],
		];

		if (!is_null($thumb)) {
			$data['thumb'] = $thumb;
		}
		if (!is_null($name)) {
			$data['name'] = $name;
			$rules['name'] = ['required'];
		}
		if (!is_null($name)) {
			$data['uid'] = $uid;
			$rules['uid'] = ['required'];
		}
		if (!is_null($pid)) {
			$data['pid'] = $pid;
			$rules['pid'] = [
				'required',
			];
		}
		if (!is_null($content)) {
			$data['content'] = $content;
			$rules['content'] = ['required'];
		}
		if (!is_null($sort)) {
			$data['sort'] = $sort;
			$rules['sort'] = ['required'];
		}
		if (!is_null($show_type)) {
			$data['show_type'] = $show_type;
		}

		if (!is_null($pid)) {
			//父id不能为自己
			$rules['pid'][] = 'isParentIdEqualsSelfId:1111,2222';
			//父id不能为下级类别
			$rules['pid'][] = 'isParentIdBelongToChild:1111,2222';
		}
		if (!is_null($is_index)) {
			$data['is_index'] = $is_index;
		}

		$message = ['pid' => '上级id不能为自己'];
		$validator = \Validator::make($data, $rules, $message);

		$this->setCreateValidator($validator);
		$result = $this->create($data);
		return $result;
	}

	public function remove($id) {

		//1.有子类存在不能删除
		\Validator::extend('isHasChild', function ($attribute, $value, $parameters, $validator) {
			$obj = \App\Models\ArticleTypeModel::where('pid', $value)->first();
			return is_null($obj);
		});
		$rule = [
			'id' => [
				'required',
				'numeric',
				'exists:article_type',
				'isHasChild',
				//2. 有文章存在不能删除
				'removeTypeCheckArticleIsExist',
			],
		];

		$validator = \Validator::make(['id' => $id], $rule);

		if ($validator->fails()) {
			$this->setCreateValidator($validator);
			return false;
		} else {
			return $this->destroy($id);
		}
	}

}
