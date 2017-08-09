<?php
/**
 * Created by PhpStorm.
 * User: admin_
 * Date: 2017/7/28
 * Time: 6:11
 */

namespace App\Http\Service;


Abstract Class BaseService
{

    protected $message;
    protected $model;

    protected function setMessage($message){
        $this->message = $message;
    }

    public function getMessage(){
        return $this->message;
    }

    public function getModel(){
        return $this->model;
    }
}