<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleModel extends BaseModel {

	use SoftDeletes;

	//
	protected $table = 'articles';

	public $fillable = [
		'title', 'thumb', 'type_id', 'content', 'author', 'user_id', 'from_host',
	];

	public function createParams($title, $thumb = null, $typeId = null, $content = null) {

		$title = is_null($title) ? 0 : $title;
		$thumb = is_null($thumb) ? 0 : $thumb;
		$typeId = is_null($typeId) ? 0 : $typeId;
		$content = is_null($content) ? 0 : $content;

		$data = [
			'title' => $title,
			'typeId' => $typeId,
			'content' => $content,
			'thumb' => $thumb,
		];

		$validator = \Validator::make($data, [
			'title' => ['required'],
			'typeId' => ['required'],
//			'thumb' => ['required'],
			'content' => ['required'],
		]);

		$this->setCreateValidator($validator);
		$result = $this->create($data);

		return $result;
	}

	public function edit($id, $title = null, $thumb = null, $typeId = null, $content = null) {

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
		if (!is_null($title)) {
			$data['title'] = $title;
			$rules['title'] = ['required'];
		}
		if (!is_null($typeId)) {
			$data['type_id'] = $typeId;
			$rules['type_id'] = [
				'required',
			];
		}
		if (!is_null($content)) {
			$data['content'] = $content;
			$rules['content'] = ['required'];
		}

//		$message = ['pid' => '上级id不能为自己'];
		$validator = \Validator::make($data, $rules);

		$this->setCreateValidator($validator);
		$result = $this->create($data);
		return $result;
	}

	public function remove($id) {

		$rule = [
			'id' => ['required', 'numeric', 'exists:articles'],
		];

		$validator = \Validator::make(['id' => $id], $rule);

		if ($validator->fails()) {
			$this->setCreateValidator($validator);
			return false;
		} else {
			return $this->destroy($id);
		}
	}

	public function articleType() {
		return $this->belongsTo(ArticleTypeModel::class, 'type_id', 'id');
	}
}