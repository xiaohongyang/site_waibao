<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Service\ConfigService;

class BaseController extends Controller
{
    //

    public function __construct(){

        $configService = new ConfigService();
        $configService->shareGlobalConfig();    
    }
     
}
