<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminsModel;
use Illuminate\Http\Request;

class AdminController extends Controller {
	//

	public function __construct() {

	}

	public function edit(Request $request) {

	    $model = AdminsModel::all()->first();

	    $password = $request->get('password');
	    $repeat_password = $request->get('repeat_password');

        $msg = "";
        if (!is_null($request->get('name'))) {

            if(is_null($password) || is_null($repeat_password)) {
                $msg = '密码或确认密码不能为空';
            } else if($password !== $repeat_password) {
                $msg = '两次输入的密码不一致';
            } else {
                $model->password = bcrypt($password);
                $rs = $model->save();
                $msg = $rs ? '密码已修改' : '密码修改失败';
            }
        }

	    return view('admin.admin.edit', [
	        'model' => $model,
            'msg' => $msg
        ]);
	}


}
