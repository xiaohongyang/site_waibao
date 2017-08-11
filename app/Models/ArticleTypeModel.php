<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArticleTypeModel extends BaseModel
{
    //
    protected $table = 'article_type';

    public $fillable = ['name', 'uid', 'pid', 'content', 'sort'];


    public function createParams($name, $uid, $pid=null, $content=null, $sort=null) {

        $pid = is_null($pid) ? 0 : $pid;
        $sort = is_null($sort) ? 0 : $sort;
        $content = is_null($content) ? 0 : $content;

        $data = [
            'name' => $name,
            'uid' => $uid,
            'pid' => $pid,
            'content' => $content,
            'sort' => $sort
        ];

        $validator = \Validator::make($data, [
            'name' => ['required'],
            'uid' => ['required'],
            'pid' => ['required']
        ]);

        $this->setCreateValidator($validator);
        $result = $this->create($data);

        return $result;
    }

    public function edit($id, $name=null, $uid=null, $pid=null, $content=null, $sort=null){

        $data = [
            'id' => $id
        ];
        $rules = [
            'id' => [
                'required'
            ]
        ];

        if(!is_null($name)){
            $data['name'] = $name;
            $rules['name'] = ['required'];
        }
        if(!is_null($name)){
            $data['uid'] = $uid;
            $rules['uid'] = ['required'];
        }
        if(!is_null($pid)){
            $data['pid'] = $pid;
            $rules['pid'] = [
                'required',
            ];
        }
        if (!is_null($content)) {
            $data['content'] = $content;
            $rules['content'] = ['required'];
        }
        if (!is_null($sort)) {
            $data['sort'] = $sort;
            $rules['sort'] = ['required'];
        }

        if(!is_null($pid)) {
            //父id不能为自己
            $rules['pid'][] = 'isParentIdEqualsSelfId:1111,2222' ;
            //父id不能为下级类别
            $rules['pid'][] = 'isParentIdBelongToChild:1111,2222' ;
        }

        $message = ['pid' => '上级id不能为自己'];
        $validator = \Validator::make($data, $rules, $message);


        $this->setCreateValidator($validator);
        $result = $this->create($data);
        return $result;
    }

}
