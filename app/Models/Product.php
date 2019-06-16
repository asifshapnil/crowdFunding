<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-17 13:40:24
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-17 13:40:34
 */


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $primaryKey = 'id';

    public function subCategory()
    {
        return $this->belongsTo('App\Models\ProductSubcategory', 'subcategory_id');
    }
    public function ratings()
    {
        return $this->hasMany('App\Models\Product_rating', 'product_id');
    }
    public function orderDetails()
    {
        return $this->hasMany('App\Models\OrderDetail', 'product_id');
    }
    public function favourite()
    {
        return $this->hasMany('App\Models\FavouriteProduct', 'product_id');
    }
    public function color()
    {
        return $this->hasMany('App\Models\ProductColor', 'product_id');
    }
    public function rank()
    {
        return $this->hasOne('App\Models\ProductRank', 'product_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
