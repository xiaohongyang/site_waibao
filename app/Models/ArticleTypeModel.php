<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleTypeModel extends BaseModel {

	use SoftDeletes;

	//
	protected $table = 'article_type';

	public $fillable = ['name', 'uid', 'pid', 'content', 'thumb', 'sort'];

	public function createParams($name, $uid, $pid = null, $content = null, $thumb = null, $sort = null) {

		$pid = is_null($pid) ? 0 : $pid;
		$sort = is_null($sort) ? 0 : $sort;
		$content = is_null($content) ? 0 : $content;
		$thumb = is_null($thumb) ? 0 : $thumb;

		$data = [
			'name' => $name,
			'uid' => $uid,
			'pid' => $pid,
			'content' => $content,
			'thumb' => $thumb,
			'sort' => $sort,
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

	public function edit($id, $name = null, $uid = null, $pid = null, $content = null, $thumb, $sort = null) {

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

		if (!is_null($pid)) {
			//父id不能为自己
			$rules['pid'][] = 'isParentIdEqualsSelfId:1111,2222';
			//父id不能为下级类别
			$rules['pid'][] = 'isParentIdBelongToChild:1111,2222';
		}

		$message = ['pid' => '上级id不能为自己'];
		$validator = \Validator::make($data, $rules, $message);

		$this->setCreateValidator($validator);
		$result = $this->create($data);
		return $result;
	}

	public function remove($id) {

		\Validator::extend('isHasChild', function ($attribute, $value, $parameters, $validator) {
		    $obj = \App\Models\ArticleTypeModel::where('pid', $value)->first();
			return is_null($obj);
		});
		$rule = [
			'id' => ['required', 'numeric', 'exists:article_type', 'isHasChild'],
		];

		$validator = \Validator::make(['id' => $id], $rule);

		if($validator->fails()){
		    $this->setCreateValidator($validator);
		    return false;
        } else {
		    return $this->destroy($id);
        }
	}

}
