<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-17 13:42:09
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-18 12:46:33
 */


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    //
    protected $table = 'project_category';
    protected $primaryKey = 'id';
    protected $classes = [
        'category4','category2','category3','category1'
    ];
    

    public function categoryClass()
    {
        $index = $this->id%count($this->classes);
        return $this->classes[$index];
    }
    public function projects()
    {
        return $this->hasMany('App\Models\Project', 'category_id');
    }
    public function createdBy()
    {
        return $this->belongsTo('App\Models\AdminUser', 'created_by');
    }
}
