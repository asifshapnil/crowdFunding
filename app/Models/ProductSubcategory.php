<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-17 13:40:57
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-18 15:16:50
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSubcategory extends Model
{
    //
    protected $table = 'product_subcategory';
    protected $primaryKey = 'id';

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'subcategory_id');
    }
    public function createdBy()
    {
        return $this->belongsTo('App\Models\AdminUser', 'created_by');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'category_id');
    }
}
