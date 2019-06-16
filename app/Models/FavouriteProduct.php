<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-17 13:37:32
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-17 13:37:47
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavouriteProduct extends Model
{
    //
    protected $table = 'favourite_products';
    protected $primaryKey = 'id';
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
