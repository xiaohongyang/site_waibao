<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use \Illuminate\Http\Request;


class GuestbookController extends Controller {
	//

	public function __construct() {
		$this->middleware('auth.admin');
	}

	public function index(Request $request) {

		$typeId = $request->get('type_id', 1);	

		return view('admin.guestbook.index', ['type_id'=>$typeId]);
	}

}
