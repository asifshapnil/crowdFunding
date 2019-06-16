<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-17 13:40:57
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-18 15:16:50
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    //
    protected $table = 'product_category';
    protected $primaryKey = 'id';

    protected $classes = [
        'category4','category2','category3','category1'
    ];
    

    public function categoryClass()
    {
        $index = $this->id%count($this->classes);
        return $this->classes[$index];
    }

    public function products()
    {
        return $this->hasManyThrough('App\Models\Product', 'App\Models\ProductSubcategory', 'category_id', 'subcategory_id');
    }

    public function subCategory()
    {
        return $this->hasMany('App\Models\ProductSubcategory', 'category_id');
    }
    public function createdBy()
    {
        return $this->belongsTo('App\Models\AdminUser', 'created_by');
    }
}
