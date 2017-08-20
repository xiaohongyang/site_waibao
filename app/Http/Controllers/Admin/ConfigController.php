<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function edit(){
        return view('admin.config.edit');
    }

    public function create(){
        return view('admin.config.create');
    }
}
