<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-17 13:41:21
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-17 13:41:32
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $table = 'profile';
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->hasOne('App\User');
    }


}
