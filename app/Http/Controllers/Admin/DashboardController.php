<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-17 11:15:24
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-18 13:27:04
 */


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\User;
use App\Models\Project;
use App\Models\Product;

class DashboardController extends Controller
{
	public function __construct()
    {
        
    }

    public function index()
    {
    	$data['title'] = "ダッシュボード";
    	$data['total_user'] = User::count();
    	$data['total_project'] = Project::count();
    	$data['total_pending_project'] = Project::where('status', 0)->count();
    	$data['total_product'] = Product::count();
    	$data['total_pending_product'] = Product::where('status', 0)->count();
    	return view('admin.dashboard', $data);
    }
}