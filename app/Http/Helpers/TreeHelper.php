<?php
/**
 * Created by PhpStorm.
 * User: xiaohongyang
 * Date: 2017/8/11
 * Time: 14:31
 */

namespace App\Http\Helpers;


class TreeHelper
{

    public static $treeToArrayCachArr;

    protected static $_instance;

    protected function __construct()
    {

    }

    public static function getInstance(){

        self::$treeToArrayCachArr = [];
        if(is_null(self::$_instance) )
            self::$_instance = new TreeHelper();
        return self::$_instance;
    }


    /**
     * 树中是否存在指定结点
     * @param $id
     * @param $tree
     * @param $columnName
     * @return bool
     */
    public function isChildExist($id, $tree, $columnName='id'){

        $result = false;
        $array = $this->conveTreeToArray($tree, $columnName);
        if(is_array($array) && count($array)) {
            foreach ($array as $item) {
                if($item[$columnName] == $id) {
                    $result = true;
                    break;
                }
            }
        }

        return $result;
    }


    public function conveTreeToArray($tree, $idColumnName, $childrenColumnName='children', $level=1){

        if(is_array($tree) && count($tree)  && !key_exists($childrenColumnName, $tree) ) {

            foreach ($tree as $item) {
                if(key_exists($childrenColumnName, $item) && count($item[$childrenColumnName])) {

                    $tmp = $item;
                    $tmp[$childrenColumnName] = [];
                    $tmp['level'] = $level;
                    self::$treeToArrayCachArr[] = $tmp;
                    $nextFunLevelParam = $level+1;
                    $this->conveTreeToArray($item[$childrenColumnName], $idColumnName, $childrenColumnName, $nextFunLevelParam);

                } else {
                    $item['level'] = $level;
                    self::$treeToArrayCachArr[] = $item;
                }
            }
        } else {
            $tree['level'] = $level;
            self::$treeToArrayCachArr[] = $tree;
        }
        return self::$treeToArrayCachArr;
    }


    /**
     * 生成树数据
     * @param $data
     * @param string $parentColumnName
     * @param int $id
     * @return array
     */
    public function generateTree($data, $parentColumnName='pid', $id=0) {

        $typeTree = [];
        //获取当前id的数据
        $currentType = $this->getTypeByID($data, $id);
        if(!is_null($currentType)) {

            $typeTree[$currentType['id']] = $currentType;

            $children = $this->getTypeChildrenByID($data, $parentColumnName, $id);
            $typeTree[$currentType['id']]['children'] = $children;

        } else {
            $children = $this->getTypeChildrenByID($data, $parentColumnName, $id);

            if(is_array($children) && count($children)) {
                foreach ($children as $item) {
                    $typeTree[$item['id']] = $item;
                }
            }
        }

        return $typeTree;
    }

    /**
     * 获取类别
     * @param $data
     * @param $id
     * @return mixed|null
     */
    protected function getTypeByID($data , $id){
        $result = null;
        if(is_array($data) && count($data)) {

            foreach ($data as $item) {
                if($item['id'] == $id)
                    $result = $item;
            }
        }
        return $result;
    }

    /**
     * 获取指定类别下的子类别树 (递归算法)
     * @param $data
     * @param string $parentColumnName
     * @param $id
     * @return array
     */
    protected function getTypeChildrenByID($data, $parentColumnName='pid' , $id){

        //获取指定id下的child
        $children = [];
        if(is_array($data) && count($data)) {
            foreach ($data as $item) {
                if($item["$parentColumnName"] == $id) {
                    $children[] = $item;
                }
            }
        }

        if(count($children)) {
            foreach ($children as &$item) {
                $item['children'] = $this->getTypeChildrenByID($data, $parentColumnName, $item['id']);
            }
        } else {
            return [];
        }
        return $children;
    }

}