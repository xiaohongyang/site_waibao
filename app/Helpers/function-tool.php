<?php
/**
 * Created by PhpStorm.
 * User: xiaohongyang
 * Date: 2017/8/11
 * Time: 9:58
 */

use App\Http\Helpers\TreeHelper;
use \App\Http\Service\ArticleTypeService;

function p($array) {
	dump($array, 1, '<pre>', 0);
}

function getTypeList($idOrName = 0, $type = 'id') {

	$id = 0;
	/*$service = new ArticleTypeService();
	if ($type != 'id') {
		$type = $service->getModel()->where('name', $idOrName)->first();
		if (!is_null($type)) {
			$id = $type->id;
		}
	} else {

		$id = $idOrName;
	}

	$tree = $service->getTree($id);*/
	$tree = \View::shared('globalTypeListTree');
	$list = TreeHelper::getInstance()->conveTreeToArray($tree, 'id', 'children');
	$result = [];
	$topType = [];
	foreach ($list as $key => $row) {
		# code...
		if( ($type=='id' && $idOrName == $row['id']) || ($type!='id' && $idOrName==$row['name']) ) {
			$topType = $row;
			$result[] = $row;
		}

		if($row['pid'] == $idOrName) {
			$result[] = $row;
		}
	}

	return $result;
}

function getTypeItem($idOrName = 0, $type = 'id',  $typeList=null) {

    $result = null;

    $typeList = getTypeList(0);
	if(!is_null($typeList) && is_array($typeList) && count($typeList)) {

	    foreach ($typeList as $row) {
            if($type=='id' && $row['id']==$idOrName) {
                $result = $row;
                break;
            } else if($row['name'] == $idOrName) {
                $result = $row;
                break;
            }
        }
    }

    return $result;
}

function getShowContent($content, $type = 'Ueditor') {
    if($type == 'Ueditor') {
        $content = "<pre>{$content}</pre>";
    }
    return $content;
}

function globalConfig($name){

	$result = '';

	$configData = \View::shared('GConfig', []);
	if(count($configData)) {
		foreach ($configData as $key => $value) {
			# code...
			if($value['name']==$name) {
				$result = $value['value'];
			}
		}
	}
	return $result;

}
