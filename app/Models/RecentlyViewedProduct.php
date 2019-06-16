<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-17 13:41:21
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-17 13:41:32
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecentlyViewedProduct extends Model
{
    //
    protected $table = 'recently_viewed_products';
    protected $primaryKey = 'id';

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
    
    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
