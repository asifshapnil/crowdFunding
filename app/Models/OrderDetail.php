<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-17 13:39:57
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-17 13:40:05
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $table = 'order_details';
    protected $primaryKey = 'id';

    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
