<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleModel extends BaseModel {

	use SoftDeletes;

	//
	protected $table = 'articles';

	public $fillable = [
		'title', 'thumb', 'type_id', 'content', 'author', 'user_id', 'from_host', 'file', 'is_index', 'attach_file', 'link', 'sort'
	];

	public function createParams($title, $thumb = null, $type_id = null, $content = null, $file= null, $is_index= null, $attach_file= null, $link=null, $sort=null) {

		$title = is_null($title) ? 0 : $title;
		$thumb = is_null($thumb) ? '' : $thumb;
		$type_id = is_null($type_id) ? 0 : $type_id;
		$content = is_null($content) ? '' : $content;
		$file = is_null($file) ? '' : $file;
		$is_index = is_null($is_index) ? 0 : $is_index;
		$attach_file = is_null($attach_file) ? '' : $attach_file;
		$link = is_null($link) ? '' : $link;
        $sort = is_null($sort) ? 0 : $sort;

		$data = [
			'title' => $title,
			'type_id' => $type_id,
			'content' => $content,
			'thumb' => $thumb,
			'file' => $file,
			'is_index' => $is_index,
			'attach_file' => $attach_file,
			'link' => $link,
            'sort' => $sort,
		];

		$validator = \Validator::make($data, [
			'title' => ['required'],
			'type_id' => ['required'],
//			'thumb' => ['required'],
		]);

		$this->setCreateValidator($validator);
		$result = $this->create($data);

		return $result;
	}

	public function edit($id, $title = null, $thumb = null, $type_id = null, $content = null, $file = null, $is_index = null, $attach_file = null, $link = null, $sort = null) {
		$data = [
			'id' => $id,
		];
		if (!is_null($file)) {
			$data['file'] = $file;
		}
		if (!is_null($is_index)) {
			$data['is_index'] = $is_index;
		}
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
		if (!is_null($attach_file)) {
			$data['attach_file'] = $attach_file;
			$rules['attach_file'] = ['required'];
		}
		if (!is_null($link)) {
			$data['link'] = $link;
			$rules['link'] = ['required'];
		}

        if (!is_null($sort)) {
            $data['sort'] = $sort;
            $rules['sort'] = ['required'];
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