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

    protected static $_instance;

    protected function __construct()
    {

    }

    public static function getInstance(){
        if(is_null(self::$_instance) )
            self::$_instance = new TreeHelper();
        return self::$_instance;
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