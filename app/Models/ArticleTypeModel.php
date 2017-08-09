<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ArticleTypeModel extends BaseModel
{
    //
    protected $table = 'article_type';

    public $fillable = ['name', 'uid', 'pid', 'content'];


    public function createParams($name, $uid, $pid=0, $content='') {

        $data = [
            'name' => $name,
            'uid' => $uid,
            'pid' => $pid,
            'content' => $content
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

    public function edit($data){
        $rs = false;
        if(key_exists('name', $data) && !strlen($data['name'])){

            $this->message = '类别名称不能为空';
        } else {
            if(key_exists('name', $data) && strlen($data['name'])){
                $rs = $this->update(['name' => $data['name']]);
            }
            if(key_exists('pid', $data) && is_int($data['pid'])){
                $rs = $this->update(['pid' => $data['pid']]);
            }
        }
        return $rs;
    }

}
