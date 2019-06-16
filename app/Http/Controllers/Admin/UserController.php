<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-18 12:06:40
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-18 15:26:28
 */


namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\User;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Controllers\Controller;

use Auth;

class UserController extends Controller
{
	public function __construct()
    {
        
    }

    public function index()
    {
    	$data['title'] = "User List";
    	return view('admin.user.list', $data);
    }

    public function data(Request $request)
    {
    	$User = User::get();

    	// dd($User[0]->createdBy->name);

        return Datatables::of($User)

        ->editColumn('created_at', '{!! date("j M Y h:i A", strtotime($created_at)) !!}')
        ->editColumn('last_login_date', '{!! date("j M Y h:i A", strtotime($last_login_date)) !!}')
        ->editColumn('status', function ($result) {
            if ($result->status==0) {
                return '<span class="text-danger">Disabled</span>';
            }
            else{
                return '<span class="text-success">Enabled</span>';
            }
        })
        ->editColumn('is_email_verified', function ($result) {
            if ($result->is_email_verified==0) {
                return '<span class="text-danger">No</span>';
            }
            else{
                return '<span class="text-success">Yes</span>';
            }
        })
        ->addColumn('total_projects', function ($result) {
            return '<a href="'.route('admin-project-list', ['user_id' => $result->id]).'" class="btn btn-link">'.$result->projects->count().'</a> ';
        })
        ->addColumn('total_products', function ($result) {
            return '<a href="'.route('admin-product-list', ['user_id' => $result->id]).'" class="btn btn-link">'.$result->products->count().'</a> ';
        })
        ->addColumn('action', function ($result) {
            $output = '';
            // if ($result->status==0) {
            //     $output .= '<a href="'.route('admin-project-category-status-change', ['id' => $result->id, 'status'=> 1]).'" class="btn btn-xs btn-success">Enable</a> ';
            // }
            // else{
            //     $output .= '<a href="'.route('admin-project-category-status-change', ['id' => $result->id, 'status'=> 0]).'" class="btn btn-xs btn-danger">Disable</a> ';
            // }
            // $output .= '<a href="'.route('admin-project-category-edit', ['id' => $result->id]).'" class="btn btn-xs btn-info">Edit</a> 
            //         <a href="'.route('admin-project-category-delete', ['id' => $result->id]).'" class="btn btn-xs btn-danger delete-sure">Delete</a>';

            $output .= ' <a href="'.route('admin-user-delete', ['id' => $result->id]).'" class="btn btn-sm btn-danger delete-sure">Delete</a>';

            if($result->quit_request==1){
                $output .= ' <a href="'.route('admin-user-quit-request', ['id' => $result->id, 'status'=> 0]).'" class="btn btn-sm btn-success">Deactive</a> ';
            }
            
            return $output;
            
        })
        ->rawColumns(['total_projects','total_products','created_at', 'last_login_date', 'is_email_verified', 'action', 'status'])
        ->make(true);
    }

    public function statusChange(Request $request)
    {
        // dd($request->status);
        $User = User::find($request->id);
        $User->status = $request->status;
        $User->save();
        return redirect()->back()->with('success_message', 'status updated');
    }

    public function quitRequest(Request $request)
    {
    	// dd($request->status);
    	$User = User::find($request->id);
        $User->status = $request->status;
    	$User->quit_request = 0;
    	$User->save();
    	return redirect()->back()->with('success_message', 'status updated');
    }

    public function delete($id=0)
    {
        if (!empty($id)) {
            $User = User::find($id);
            if (!empty($User)) {
                if ($User->delete()) {
                    return redirect()->back()->with('success_message', 'Successfully Deleted!');
                }
            }
        }
        return redirect()->back()->with('error_message', 'Data Not Found!');
    }

    
}