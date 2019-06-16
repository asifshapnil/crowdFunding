<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\AdminUser;
use Yajra\Datatables\Facades\Datatables;

use Validator;
use Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('admin.admin_users.list');
    }

    public function data()
    {
        $posts = AdminUser::select(['id','name','email','type','status', 'created_at']);

        return Datatables::of($posts)
        ->editColumn('created_at', '{!! date("j M Y h:i A", strtotime($created_at)) !!}')
        ->editColumn('status', function ($result) {
            if ($result->status==0) {
                return '<span class="text-danger">Disabled</span>';
            }
            else{
                return '<span class="text-success">Enabled</span>';
            }
        })
        ->editColumn('type', function ($result) {
            if ((int)$result->type==2) {
                return '<span class="text-primary">Super Admin</span>';
            }
            else{
                return '<span class="text-info">Admin</span>';
            }
        })
        ->addColumn('action', function ($result) {
            $output = '';
            if ($result->status==0) {
                $output .= '<a href="'.route('admin-admin-user-status-change', ['package_id' => $result->id, 'status'=> 1]).'" class="btn btn-sm btn-success inline">Enable</a> ';
            }
            else{
                $output .= '<a href="'.route('admin-admin-user-status-change', ['package_id' => $result->id, 'status'=> 0]).'" class="btn btn-sm btn-danger inline">Disable</a> ';
            }
            $output .= '<a href="'.route('admin-admin-user-edit', ['package_id' => $result->id]).'" class="btn btn-sm btn-info inline">Edit</a> 
                    <a href="'.route('admin-admin-user-delete', ['package_id' => $result->id]).'" class="btn btn-sm btn-danger delete-sure inline">Delete</a>';
            return $output;
            
        })
        ->rawColumns(['status', 'type', 'created_at', 'action'])
        ->make(true);
    }

    public function statusChange($id = 0, $status = 0)
    {
        if (!empty($id)) {
            if ($status != 0) {
                $status = 1;
            }
            $User = AdminUser::find($id);
            if (!empty($User)) {
                $User->status = $status;
                if ($User->save()) {
                    return redirect()->route('admin-admin-user-list')->with('success_message', 'News status changed!');
                }
            }
        }
        return redirect()->route('admin-admin-user-list')->with('error_message', 'Error. Please try again!');
    }

    public function add()
    {
        return view('admin.admin_users.add');
    }

    public function addAction(Request $request)
    {
        $input_rules['name'] = 'required';
        $input_rules['email'] = 'required';
        $input_rules['password'] = 'required';
        $input_rules['status'] = 'required|numeric';

        $validator = Validator::make($request->all(), $input_rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $AdminUser = new AdminUser();
        $AdminUser->name = $request->get('name');
        $AdminUser->email = $request->get('email');
        $AdminUser->password = Hash::make($request->get('password'));
        $AdminUser->status = $request->get('status');
        if ($AdminUser->save()) {
            return redirect()->route('admin-admin-user-list')->with('success_message', 'AdminUser successfully added.');
        }

        return redirect()->back()->with('error_message', 'Database Error!.');
    }

    public function edit($id=0)
    {
        if (!empty($id)) {
            $AdminUser = AdminUser::find($id);
            if (!empty($AdminUser)) {
                $data['AdminUser'] = $AdminUser;
                return view('admin.admin_users.edit', $data);
            }
        }
        return redirect()->back()->with('error_message', 'Data Not Found!');
    }

    public function editAction($id=0, Request $request)
    {
        $input_rules['name'] = 'required';
        $input_rules['email'] = 'required';
        //$input_rules['password'] = 'required';
        $input_rules['status'] = 'required|numeric';

        $validator = Validator::make($request->all(), $input_rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (!empty($id)) {
            $AdminUser = AdminUser::find($id);
            $AdminUser->name = $request->get('name');
            $AdminUser->email = $request->get('email');
            if (!empty($request->get('password'))) {
                $AdminUser->password = Hash::make($request->get('password'));
            }
            $AdminUser->status = $request->get('status');
            if ($AdminUser->save()) {
                return redirect()->route('admin-admin-user-list')->with('success_message', 'AdminUser successfully updated.');
            }
        }

        return redirect()->back()->with('error_message', 'Database Error!');
    }

    public function delete($id=0)
    {
        if (!empty($id)) {
            $AdminUser = AdminUser::find($id);
            if (!empty($AdminUser)) {
                if ($AdminUser->delete()) {
                    return redirect()->back()->with('success_message', 'Successfully Deleted!');
                }
            }
        }
        return redirect()->back()->with('error_message', 'Data Not Found!');
    }

}