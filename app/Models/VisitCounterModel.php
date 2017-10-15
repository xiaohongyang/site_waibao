<?php
/**
 * Created by PhpStorm.
 * User: admin_
 * Date: 2017/10/15
 * Time: 18:46
 */

namespace App\Models;


class VisitCounterModel extends BaseModel
{

    const TYPE_WEB_VISIT = 1; //网站访问
    const TYPE_ARTICLE_VISIT = 2; //文章访问
    const TYPE_ARTICLE_TYPE_VISIT = 3; //文章类别访问
    const TYPE_ARTICLE_DOWN = 4; //文章附件下载


    protected $fillable = [
        'ip', 'type', 'article_id', 'updated_at'
    ];

    protected $table = 'visit_counter';

    public function createParams($ip, $article_id=null, $type=null){

        $article_id = is_null($article_id) ? 0 : $article_id;
        $type = is_null($type) ? 0 : $type;
        $data = [
            'ip' => $ip,
            'type' => $type,
            'article_id' => $article_id
        ];

        $rule = [
        ];
        $validator = \Validator::make($data, [
            $rule
        ]);

        $this->setCreateValidator($validator);
        $result = $this->create($data);
        return $result;
    }

    public function edit($id, $ip=null, $article_id=null, $type=null){

        $result = false;
        if(is_null($id) || !is_numeric($id) || !$id){
            return $result;
        }

        $model = new static();

        $article_id = is_null($article_id) ? 0 : $article_id;
        $type = is_null($type) ? 0 : $type;
        $data = [
            'id' => $id,
        ];
        $rules = [
            'id' => [
                'required',
            ],
        ];

        if(!is_null($ip)) {
            $data['ip'] = $ip;
        }
        if(!is_null($article_id)) {
            $data['article_id'] = $article_id;
        }
        if(!is_null($type)) {
            $data['type'] = $type;
        }

        $validator = \Validator::make($data, $rules);

        $this->setCreateValidator($validator);
        $data['updated_at'] = date('Y-m-d H:i:s', time());
        $result = $this->update($data);
        return $result;
    }




    public function remove($id) {

        $result = false;

        $data = ['id' => $id];
        $rule = [
            'id' => 'required'
        ];
        $validator = \Validator::make($data,$rule);
        if(!$validator->fails()) {
            $result = $this->destory($id);
        }
        return $result;
    }

}