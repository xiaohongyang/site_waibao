<?php
/**
 * Created by PhpStorm.
 * User: xiaohongyang
 * Date: 2017/2/16
 * Time: 22:01
 */

namespace App\Providers;
use App\Http\Helpers\TreeHelper;
use App\Http\Service\ArticleTypeService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use App\Models\ArticleModel;

class ValidatorServiceProvider extends ServiceProvider
{


    public function boot() {

        //customer validation customerStrLess3
        \Validator::extend('customerStrLess3', function($attribute, $value, $parameters, $validator){
            return strlen($value) < 3;
        });

        //customer validation error message
        \Validator::replacer('customerStrLess3', function($message, $attribute, $rule, $parameter) {
            return $attribute . "长度必须小于3个字符";
        });

        /**
         * 父id不能为自己
         */
        \Validator::extend('isParentIdEqualsSelfId', function($attribute, $value, $articleTypeModel, $validator){

            $data = $validator->getData();
            return $value != $data['id'];
        });

        /**
         * 父id不能为自己的子类id
         * isParentIdBelongToChild
         */
        \Validator::extend('isParentIdBelongToChild', function($attribute, $value, $articleTypeModel, $validator){
            $data = $validator->getData();

            $typeService = new ArticleTypeService();
            $tree = $typeService->getTree($data['id']);
            $a = TreeHelper::getInstance()->isChildExist($value, $tree, 'id');
            return !$a;
        });

        \Validator::extend('removeTypeCheckArticleIsExist', function($attribute, $value, $params, $validator){

            return ArticleModel::where('type_id', $value)->first() == null;

        });
    }

    public function register(){

    }
}