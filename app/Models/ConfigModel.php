<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConfigModel extends BaseModel
{
    //

    const USE_ENABLE = 1; //开启
    const USE_DISABLE = 2; //停用

    use SoftDeletes;

    protected $fillable = [
        'name', 'value', 'is_use'
    ];

    protected $table = 'config';

    public function createParams($name, $value, $is_use=null){

        $is_use = is_null($is_use) ? self::USE_DISABLE : $is_use;

        $data = [
            'name' => $name,
            'value' => $value,
            'is_use' => $is_use
        ];

        $rule = [

        ];
        $validator = \Validator::make($data, [
            $rule
        ]);

//
//print_r($name);
//print_r($value);
//print_r($data);
        $this->setCreateValidator($validator);
        $result = $this->create($data);
        return $result;
    }

    public function edit($id ,$name=null, $value=null, $is_use=null){

        $is_use = is_null($is_use) ? self::USE_DISABLE : $is_use;

        $data = [
            'id' => $id,
        ];
        $rules = [
            'id' => [
                'required',
            ],
        ];

        if(!is_null($name)) {
            $data['name'] = $name;
        }
        if(!is_null($value)) {
            $data['value'] = $value;
        }
        if(!is_null($is_use)) {
            $data['is_use'] = $is_use;
        }

        $validator = \Validator::make($data, $rules);

        $this->setCreateValidator($validator);
        $result = $this->create($data);
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
