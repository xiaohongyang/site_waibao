<?php
/**
 * Created by PhpStorm.
 * User: xiaohongyang
 * Date: 2017/8/11
 * Time: 9:58
 */

use \App\Http\Service\ArticleTypeService;
use App\Http\Helpers\TreeHelper;

function p ($array) {
    dump($array, 1, '<pre>', 0);
}


function getTypeList($idOrName = 0, $type='id'){

    $id = 0;
    $service = new ArticleTypeService();
    if($type != 'id'){
        $type = $service->getModel()->where('name', $idOrName)->first();
        if(!is_null($type)) {
            $id= $type->id;
        }
    } else {

        $id = $idOrName;
    }

    $tree = $service->getTree($id);
    $list = TreeHelper::getInstance()->conveTreeToArray($tree,'id','children');

    return $list;
}

function getTypeItem($idOrName = 0, $type='id') {


    $service = new ArticleTypeService();
    if($type != 'id'){
        $type = $service->getModel()->where('name', $idOrName)->first();
    } else {
        $type = $service->getModel()->where('id', $idOrName)->first();
    }

    return $type;
}