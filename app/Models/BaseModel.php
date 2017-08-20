<?php
/**
 * Created by PhpStorm.
 * User: xiaohongyang
 * Date: 2017/6/19
 * Time: 11:16
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model {

	public $message;

	public $createValidator = null;
	public $editValidator = null;

	public function create($data) {

		$result = false;
		$validator = $this->getCreateValidator();
		if ($validator->fails()) {
			$this->message = $validator->messages()->getMessageBag();
		} else {
			$this->fill($data);
			$result = $this->save() ? true : false;
		}

		return $result;
	}

	/*public function edit($data){

		        $result = false;
		        $validator = $this->getCreateValidator();
		        if ($validator->fails()) {
		            $this->message = $validator->messages()->getMessageBag();
		        } else {
		            $this->fill($data);
		            $result = $this->save() ? true : false;
		        }

		        return $result;
	*/

	public static function getByID($id, $column = 'id') {
		return static::where($column, $id)->first();
	}

	#region getter and setter
	/**
	 * @return null
	 */
	public function getEditValidator() {
		return $this->editValidator;
	}

	/**
	 * @param null $editValidator
	 */
	public function setEditValidator($editValidator) {
		$this->editValidator = $editValidator;
	}

	/**
	 * @return null
	 */
	public function getCreateValidator() {
		return $this->createValidator;
	}

	/**
	 * @param null $createValidator
	 */
	public function setCreateValidator($createValidator) {
		$this->createValidator = $createValidator;
	}

	#endregion
}