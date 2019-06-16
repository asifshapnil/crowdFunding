<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-17 13:38:55
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-17 13:39:20
 */


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $table = 'messages';
    protected $primaryKey = 'id';

    public function to()
    {
        return $this->belongsTo('App\User', 'to_id');
    }
    public function from()
    {
        return $this->belongsTo('App\User', 'from_id');
    }
}
