<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConfigModel extends BaseModel
{
    //

    const USE_ENABLE = 1;
    const USE_DISABLE = 2;

    use SoftDeletes;

    protected $fillable = [
        'name', 'value', 'is_user'
    ];

    public function createParams($name, $value, $isUse=null){



    }

}
