<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class AdminsModel extends BaseModel {


	protected $table = 'admins';

	public $fillable = ['name', 'email', 'password', 'remember_token'];


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

}
