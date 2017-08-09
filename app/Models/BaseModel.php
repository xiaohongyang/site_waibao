<?php
/**
 * Created by PhpStorm.
 * User: xiaohongyang
 * Date: 2017/6/19
 * Time: 11:16
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    public $message ;

    public $createValidator=null;

    /**
     * @return null
     */
    public function getCreateValidator()
    {
        return $this->createValidator;
    }

    /**
     * @param null $createValidator
     */
    public function setCreateValidator($createValidator)
    {
        $this->createValidator = $createValidator;
    }


    public function create($data){

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

    public static function getByID($id, $column = 'id') {
        return static::where($column, $id)->first();
    }
}