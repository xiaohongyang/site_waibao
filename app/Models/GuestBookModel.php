<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class GuestBookModel extends BaseModel {

	const TYPE_GUESTBOOK = 1;
	const TYPE_SURVEY = 2;

	public static function getTypes() {
		return [
			1 => '留言本',
			2 => '调查表',
		];
	}

	//
	use SoftDeletes;
	protected $table = 'guest_book';

	protected $fillable = [
		'column01',
		'column02',
		'column03',
		'column04',
		'column05',
		'column06',
		'column07',
		'column08',
		'column09',
		'column10',
		'column12',
		'type_id',
        'verified',
        'parent_id'
	];

	private $type_id;
	public function setTypeId($typeId) {
		$typeId = is_null($typeId) ? self::TYPE_GUESTBOOK : $typeId;
		$this->type_id = $typeId;
	}
	public function getTypeId() {
		return $this->type_id;
	}

	private $parent_id = 0;
	public function setParentId($parentId) {
		$parentId = is_null($parentId) ? 0 : $parentId;
		$this->parent_id = $parentId;
	}
	public function getParentId() {
		return $this->parent_id;
	}

	public function reply(){
	    return $this->hasMany(GuestBookModel::class, 'parent_id', 'id');
    }

	public function createParams($column01, $column02, $column03, $column04, $column05, $column06, $column07, $column08, $column09, $column10) {

		$typeId = is_null($this->getTypeId()) ? self::TYPE_GUESTBOOK : $this->getTypeId();
		$parentId = is_null($this->getParentId()) ? 0 : $this->getParentId();
		$data = [
			'column01' => $column01,
			'column02' => $column02,
			'column03' => $column03,
			'column04' => $column04,
			'column05' => $column05,
			'column06' => $column06,
			'column07' => $column07,
			'column08' => $column08,
			'column09' => $column09,
			'column10' => $column10,
			'type_id' => $typeId,
            'column12' => $_SERVER['REMOTE_ADDR'],
            'parent_id' => $parentId
		];

		$rule = [
			'column10' => ['required'],
		];
		$validator = \Validator::make($data, $rule);

		$this->setCreateValidator($validator);
		$result = $this->create($data);
		return $result;
	}

	public function edit($id, $column01 = null, $column02 = null, $column03 = null, $column04 = null, $column05 = null, $column10 = null) {

		$data = [
			'id' => $id,
		];
		$rules = [
			'id' => [
				'required',
			],
		];

		$type_id = $this->getTypeId();

		if (!is_null($column01)) {$data['column01'] = $column01;}
		if (!is_null($column02)) {$data['column02'] = $column02;}
		if (!is_null($column03)) {$data['column03'] = $column03;}
		if (!is_null($column04)) {$data['column04'] = $column04;}
		if (!is_null($column05)) {$data['column05'] = $column05;}
		if (!is_null($column10)) {$data['column10'] = $column10;}
		if (!is_null($type_id)) {$data['type_id'] = $type_id;}

		$validator = \Validator::make($data, $rules);

		$this->setCreateValidator($validator);
		$result = $this->create($data);
		return $result;
	}

	public function remove($id) {

		$result = false;

		$data = ['id' => $id];
		$rule = [
			'id' => ['required'],
		];
		$validator = \Validator::make($data, $rule);

		if ($validator->fails()) {
			$this->setCreateValidator($validator);
			return false;
		} else {
			return $this->destroy($id);
		}
	}

}
