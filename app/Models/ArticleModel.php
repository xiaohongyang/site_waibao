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

	public function createParams($title, $thumb = null, $type_id = null, $content = null) {

		$title = is_null($title) ? 0 : $title;
		$thumb = is_null($thumb) ? 0 : $thumb;
		$type_id = is_null($type_id) ? 0 : $type_id;
		$content = is_null($content) ? 0 : $content;

		$data = [
			'title' => $title,
			'type_id' => $type_id,
			'content' => $content,
			'thumb' => $thumb,
		];

		$validator = \Validator::make($data, [
			'title' => ['required'],
			'type_id' => ['required'],
//			'thumb' => ['required'],
			'content' => ['required'],
		]);

		$this->setCreateValidator($validator);
		$result = $this->create($data);

		return $result;
	}

	public function edit($id, $title = null, $thumb = null, $type_id = null, $content = null) {

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
		if (!is_null($type_id)) {
			$data['type_id'] = $type_id;
			$rules['type_id'] = [
				'required',
			];
		}
		if (!is_null($content)) {
			$data['content'] = $content;
			$rules['content'] = ['required'];
		}

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