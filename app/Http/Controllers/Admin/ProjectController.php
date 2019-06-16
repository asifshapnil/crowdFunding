<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-18 12:06:40
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-18 15:26:28
 */


namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\Models\Project;

use Yajra\Datatables\Facades\Datatables;

use App\Http\Controllers\Controller;

use Auth;

class ProjectController extends Controller
{
	public function __construct()
    {
        
    }

    public function projectList(Request $request)
    {
    	$data['title'] = "Project List";
        $data['user_id'] = 0;
        $data['category_id'] = 0;
        $data['status'] = null;
        if(!empty($request->user_id)){
            $data['user_id'] = $request->user_id;
        }
        if(!empty($request->category_id)){
            $data['category_id'] = $request->category_id;
        }
        if($request->status !== null){
            $data['status'] = $request->status;
        }
    	return view('admin.project.list', $data);
    }

    public function data(Request $request)
    {
    	$query = Project::query();
        if(!empty($request->user_id)){
            $query->where('user_id', $request->user_id);
        }
        if(!empty($request->category_id)){
            $query->where('category_id', $request->category_id);
        }
        if($request->status !== null){
            $query->where('status', $request->status);
        }
        $Project = $query->get();

    	// dd($Project[0]->createdBy->name);

        return Datatables::of($Project)

        ->editColumn('created_at', '{!! date("j M Y h:i A", strtotime($created_at)) !!}')
        //->editColumn('end', '{!! date("j M Y h:i A", strtotime($end)) !!}')
        ->editColumn('status', function ($result) {
            if ($result->status==0) {
                return '<span class="text-info">Pending</span>';
            }
            else if ($result->status==1) {
                return '<span class="text-success">Active</span>';
            }
            else if ($result->status==2) {
                return '<span class="text-primary">Completed</span>';
            }
            else if ($result->status==3) {
                return '<span class="text-warning">Hold</span>';
            }
            else if ($result->status==4) {
                return '<span class="text-danger">Rejected</span>';
            }
            else{
                return '<span class="text-default">Unknown</span>';
            }
        })
        ->addColumn('created_by', function ($result) {
            return $result->user->first_name.' '.$result->user->last_name;
        })
        /*->addColumn('category', function ($result) {
            return $result->category->name;
        })
        ->addColumn('total_point', function ($result) {
            return $result->reward->sum('amount');
        })
        ->addColumn('total_invested', function ($result) {
            return $result->investment->count();
        })
        ->addColumn('total_invested_amount', function ($result) {
            return $result->investment->sum('amount');
        })*/
        ->addColumn('title', function ($result) {
            return '<a href="'.route('admin-project-details',['id'=>$result->id]).'">'.$result->title.'</a>';
        })
        ->addColumn('action', function ($result) {
            $returnData = '';
            if ($result->status==0) {
                $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$result->id, 'status'=>1]).'" class="btn btn-xs btn-success inline">Active</a> '; //last_interest_at = current date time
                $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$result->id, 'status'=>4]).'" class="btn btn-xs btn-danger inline">Reject</a> ';
            }
            else if ($result->status==1) {
                $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$result->id, 'status'=>3]).'" class="btn btn-xs btn-warning inline">Hold</a> ';
                $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$result->id, 'status'=>4]).'" class="btn btn-xs btn-danger inline">Reject</a> ';
            }
            else if ($result->status==3) {
                $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$result->id, 'status'=>1]).'" class="btn btn-xs btn-success inline">Active</a> ';
                $returnData .= '<a href="'.route('admin-project-status-change',['id'=>$result->id, 'status'=>4]).'" class="btn btn-xs btn-danger inline">Reject</a> ';
            }
            else{
                //
            }

            $returnData .= '<a href="'.route('admin-project-delete', ['id' => $result->id]).'" class="btn btn-xs btn-danger delete-sure">Delete</a>';

            return $returnData;
            
        })
        ->rawColumns(['title', 'created_at', 'created_by', 'action', 'status'])
        ->make(true);
    }

    public function statusChange(Request $request)
    {
        $Project = Project::find($request->id);
        $Project->status = $request->status;
        $Project->save();
        return redirect()->back()->with('success_message', 'status updated');
    }

    public function delete(Request $request)
    {
        Project::find($request->id)->delete();
        return redirect()->back()->with('success_message', 'Project deleted successfully');
    }

    public function details(Request $request)
    {
        $data['project'] = Project::find($request->id);
        return view('admin.project.details', $data);
    }

    
}