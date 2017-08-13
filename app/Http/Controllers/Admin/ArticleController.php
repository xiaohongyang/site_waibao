<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ArticleController extends Controller {
	//

	public function __construct() {
		$this->middleware('auth.admin');
	}

	public function index() {
		return view('admin.article.index');
	}

	public function create() {
		return view('admin.article.create');
	}
}
