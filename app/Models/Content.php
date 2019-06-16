<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-17 13:38:55
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-17 13:39:20
 */


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    //
    protected $table = 'contents';
    protected $primaryKey = 'id';

    public function createdBy()
    {
        return $this->belongsTo('App\Models\AdminUser', 'created_by');
    }
}
