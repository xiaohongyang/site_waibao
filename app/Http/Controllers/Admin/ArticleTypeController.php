<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleTypeController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index(){
        return view('admin.article-type.index');
    }

    public function create(){
        return view('admin.article-type.create');
    }
}
