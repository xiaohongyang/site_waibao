<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuestBookModel extends BaseModel
{
    //
    use SoftDeletes;
    protected $table = 'guest_book';

    protected $fillable = [
        'column01',
    	'column02',
    	'column03',
    	'column04',
    	'column05',
    	'column010'
    ];


    public function createParams($column01, $column02, $column03, $column04, $column05, $column10){

         
        $data = [
            'column01' => $column01,
            'column02' => $column02,
            'column03' => $column03,
            'column04' => $column04,
            'column05' => $column05,
            'column10' => $column10,
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

    public function edit($id, $column01=null, $column02=null, $column03=null, $column04=null, $column05=null, $column10=null){
 
        $data = [
            'id' => $id,
        ];
        $rules = [
            'id' => [
                'required',
            ],
        ];

        if(!is_null($column01)) {$data['column01'] = $column01; }
        if(!is_null($column02)) {$data['column02'] = $column02; }
        if(!is_null($column03)) {$data['column03'] = $column03; }
        if(!is_null($column04)) {$data['column04'] = $column04; }
        if(!is_null($column05)) {$data['column05'] = $column05; }
        if(!is_null($column10)) {$data['column10'] = $column10; }

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
