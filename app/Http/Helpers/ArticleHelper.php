<?php
/**
 * Created by PhpStorm.
 * User: xiaohongyang
 * Date: 2017/8/11
 * Time: 14:31
 */

namespace App\Http\Helpers;


use App\Http\Service\ArticleService;
use App\Http\Service\ArticleTypeService;

class ArticleHelper
{


    protected static $_instance;

    protected function __construct()
    {

    }

    public static function getInstance(){

        self::$treeToArrayCachArr = [];
        if(is_null(self::$_instance) )
            self::$_instance = new static();
        return self::$_instance;
    }

    public function getListByTypeId($typeID, $isIndex=true){


    }


}