<?php

namespace App\Http\Controllers\Api;

use App\Http\Service\ArticleTypeService;
use App\Models\ArticleTypeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleTypeController extends BaseApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return ArticleTypeModel::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return [
            'name',
            'pid'
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $pid = $request->get('pid', 0);
        $content = $request->get('content', '');
        $articleTypeService = new ArticleTypeService();
        $result = $articleTypeService->create($name, \Auth::guard('api')->id(), $pid, $content);

        $message = $result ?  $articleTypeService->getModel() : ( $articleTypeService->getMessage() ? : 'failed' );
        $this->setJsonResult($result ? 1 : 0, $message);
        return $this->getJsonResult();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $result = [
            'status' => 0,
            'data' => [],
            'message' => []
        ];
        $model = ArticleTypeModel::find($id);
        if($model){
            $result['status'] = 1;
            $result['data'] = $model;
        }

        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $result = [
            'status' => 0,
            'data' => [],
            'message' => ''
        ];
        $model = ArticleTypeModel::find($id);
        if($model && $model->uid == \Auth::guard('api')->id()) {
            $result['status'] = 1;
            $result['data'] = $model;
        } else if($model){
            $result['message'] = "您没有权限";
        }

        return $result;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $result = [
            'status' => 0,
            'message' => ''
        ];
        $data = $request->input();

        $model = ArticleTypeModel::find($id);
        if($model && $model->uid == \Auth::guard('api')->id()) {
            $rs = $model->edit($data);
            if($rs){
                $result['status'] = 1;
            }
        }
        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $result = [
            'status' => 0, 'message' => '删除失败!'
        ];
        $model = ArticleTypeModel::find($id);
        if(!$model){

            $result['message'] = "数据不存在";
        } else if($model->uid != \Auth::guard('api')->id()){
            $result['message'] = "没有权限";
        } else{
            $rs = ArticleTypeModel::destroy($id);
            if($rs){
                $result['status'] = 1;
                $result['message'] = '删除成功';
            }
        }

        return $result;
    }
}
