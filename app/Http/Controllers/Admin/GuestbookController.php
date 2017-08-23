<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class GuestbookController extends Controller {
	//

	public function __construct() {
		$this->middleware('auth.admin');
	}

	public function index() {
		return view('admin.guestbook.index');
	}

}
