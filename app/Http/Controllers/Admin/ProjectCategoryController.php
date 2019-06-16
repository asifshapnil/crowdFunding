<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-18 12:06:40
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-18 15:26:28
 */


namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\Models\ProjectCategory;

use Yajra\Datatables\Facades\Datatables;

use App\Http\Controllers\Controller;

use Auth;

class ProjectCategoryController extends Controller
{
	public function __construct()
    {
        
    }

    public function categoryList()
    {
    	$data['title'] = "プロジェクトカテゴリ一覧";
    	return view('admin.project_category.list', $data);
    }

    public function data(Request $request)
    {
    	$ProjectCategory = ProjectCategory::withCount('projects')->get();

    	// dd($ProjectCategory[0]->createdBy->name);

        return Datatables::of($ProjectCategory)

        ->editColumn('created_at', '{!! date("j M Y h:i A", strtotime($created_at)) !!}')
        ->editColumn('status', function ($result) {
            if ($result->status==0) {
                return '<span class="text-danger">Disabled</span>';
            }
            else{
                return '<span class="text-success">Enabled</span>';
            }
        })
        ->editColumn('created_by', function ($result) {
            return $result->createdBy->name;
        })
        ->editColumn('name', function ($result) {
            return '<a href="'.route('admin-project-list',['category_id'=>$result->id]).'">'.$result->name.'</a>';
        })
        ->editColumn('projects_count', function ($result) {
            return '<a href="'.route('admin-project-list',['category_id'=>$result->id]).'">'.$result->projects_count.'</a>';
        })
        ->addColumn('action', function ($result) {
            $output = '';
            if ($result->status==0) {
                $output .= '<a href="'.route('admin-project-category-status-change', ['id' => $result->id, 'status'=> 1]).'" class="btn btn-sm btn-success">Enable</a> ';
            }
            else{
                $output .= '<a href="'.route('admin-project-category-status-change', ['id' => $result->id, 'status'=> 0]).'" class="btn btn-sm btn-danger">Disable</a> ';
            }
            $output .= '<a href="'.route('admin-project-category-edit', ['id' => $result->id]).'" class="btn btn-sm btn-info">Edit</a> 
                    <a href="'.route('admin-project-category-delete', ['id' => $result->id]).'" class="btn btn-sm btn-danger delete-sure">Delete</a>';
            return $output;
            
        })
        ->rawColumns(['name','projects_count','created_at', 'action', 'status'])
        ->make(true);
    }

    public function statusChange(Request $request)
    {
    	// dd($request->status);
    	$ProjectCategory = ProjectCategory::find($request->id);
    	$ProjectCategory->status = $request->status;
    	$ProjectCategory->save();
    	return redirect()->back()->with('success_message', 'status updated');
    }

    public function delete(Request $request)
    {
    	ProjectCategory::find($request->id)->delete();
    	return redirect()->back()->with('success_message', 'Project category deleted successfully');
    }

    public function add()
    {
    	$data['title'] = "Add New Project Category";
    	return view('admin.project_category.add', $data);
    }
    public function addAction(Request $request)
    {
    	$this->validate($request, [	        
	        'name' => 'required|max:255|unique:project_category'
	    ]);
	    $ProjectCategory = new ProjectCategory();
	    $ProjectCategory->name = $request->name;
	    $ProjectCategory->created_by = Auth::guard('admin')->user()->id;
	    $ProjectCategory->status = true;
	    $ProjectCategory->save();

	    return redirect()->back()->with('success_message', 'Project category successfully added !!');
    } 
    public function edit(Request $request)
    {
    	$data['title'] = "Update Project Category";
    	$data['details'] = ProjectCategory::find($request->id);
    	return view('admin.project_category.edit', $data);
    }
    public function editAction(Request $request)
    {
    	$this->validate($request, [	        
	        'name' => 'required|max:255|unique:project_category,name,'.$request->id
	    ]);
	    $ProjectCategory = ProjectCategory::find($request->id);
	    $ProjectCategory->name = $request->name;
	    $ProjectCategory->save();

	    return redirect()->back()->with('success_message', 'Project category successfully updated !!');
    }
}