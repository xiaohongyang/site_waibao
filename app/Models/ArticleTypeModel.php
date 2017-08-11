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
                'required',
                Rule::exists('article_type')
                    ->where(function($query){
                        $query->where('id', 1);
                    })
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
                'required'
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

        $validator = \Validator::make($data, $rules);

        if(!is_null($pid)) {

            $validator->sometimes('pid', 'required', function ($input) {
                return true;
            });

        }

        $this->setCreateValidator($validator);
        $result = $this->create($data);
        return $result;
    }

}
