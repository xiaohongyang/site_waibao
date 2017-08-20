<?php
/**
 * Created by PhpStorm.
 * User: admin_
 * Date: 2017/8/17
 * Time: 21:44
 */

namespace App\Http\Controllers;
use \App\Http\Service\ArticleTypeService;

class BaseController extends Controller
{
    public function __construct()
    {

        $this->shareShareParams();
    }


    protected function shareShareParams(){

        $service = new ArticleTypeService();
        $service->shareGlobalTypes();
        $service->shareGlobalTypesTree();
    }


}