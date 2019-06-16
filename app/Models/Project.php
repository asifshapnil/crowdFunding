<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-17 13:41:21
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-17 13:41:32
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $table = 'projects';
    protected $primaryKey = 'id';

    public function category()
    {
        return $this->belongsTo('App\Models\ProjectCategory', 'category_id');
    }
    public function investment()
    {
        return $this->hasMany('App\Models\Investment', 'project_id');
    }
    public function reward()
    {
        return $this->hasMany('App\Models\Reward', 'project_id');
    }
    public function details()
    {
        return $this->hasMany('App\Models\ProjectDetails', 'project_id');
    }
    public function favourite()
    {
        return $this->hasMany('App\Models\FavouriteProject', 'project_id');
    }
    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
    public function investedReward()
    {
        return $this->hasManyThrough('App\Models\InvestmentReward', 'App\Models\Investment', 'project_id', 'investment_id');
    }

}
