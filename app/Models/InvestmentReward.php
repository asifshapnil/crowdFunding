<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-17 13:37:32
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-17 13:37:47
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestmentReward extends Model
{
    //
    protected $table = 'investment_rewards';
    protected $primaryKey = 'id';

    public function reward()
    {
        return $this->belongsTo('App\Models\Reward', 'reward_id');
    }
}
