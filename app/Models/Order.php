<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-17 13:39:57
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-17 13:40:05
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $primaryKey = 'id';

    public function details()
    {
        return $this->hasMany('App\Models\OrderDetail', 'order_id');
    }

    public function order_by()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
