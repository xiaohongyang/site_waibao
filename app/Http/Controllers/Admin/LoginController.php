<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends BaseController {
	//

	use AuthenticatesUsers;

	protected $redirectTo = '/admin/dash';

	protected $username;

	public function __construct() {

		parent::__construct();
		// $this->middleware('auth.admin', ['except' => ['showLoginForm']]);
		$this->middleware('auth.checkIsAdmin', ['except' => ['logout']]);
	}

	public function index() {

	}
	public function username() {
		return 'name';
	}

	public function test() {
		echo 'test';
	}

	public function showLoginForm() {
		return view('admin.login.login');
	}

//    public function login(Request $request)
	//    {
	//        return pa
	//    }

	protected function guard() {
		return auth()->guard('admin');
	}

}
