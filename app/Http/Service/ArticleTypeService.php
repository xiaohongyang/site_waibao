<?php
/**
 * Created by PhpStorm.
 * User: admin_
 * Date: 2017/8/9
 * Time: 19:58
 */

namespace App\Http\Service;


use App\Models\ArticleTypeModel;

class ArticleTypeService extends BaseService
{

    public function getMessage(){
        return $this->model->message;
    }

    public function __construct(){

        $this->model = new ArticleTypeModel();
    }


    public function create($name, $uid, $pid=0, $content=''){

        $result = $this->model->createParams($name, $uid, $pid, $content);
        return $result;
    }

}