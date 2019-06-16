<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-18 15:04:43
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-18 15:25:34
 */


namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\Models\Content;

use Yajra\Datatables\Facades\Datatables;

use App\Http\Controllers\Controller;

use Auth;

class ContentController extends Controller
{
	public function __construct()
    {
        
    }

    public function contentList()
    {
    	$data['title'] = "Content List";
    	return view('admin.content.list', $data);
    }

    public function data(Request $request)
    {
    	$Content = Content::get();

    	// dd($Content[0]->createdBy->name);

        return Datatables::of($Content)

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
        ->addColumn('action', function ($result) {
            $output = '';
            if ($result->status==0) {
                $output .= '<a href="'.route('admin-content-status-change', ['id' => $result->id, 'status'=> 1]).'" class="btn btn-sm btn-success">Enable</a> ';
            }
            else{
                $output .= '<a href="'.route('admin-content-status-change', ['id' => $result->id, 'status'=> 0]).'" class="btn btn-sm btn-danger">Disable</a> ';
            }
            $output .= '<a href="'.route('admin-content-edit', ['id' => $result->id]).'" class="btn btn-sm btn-info">Edit</a>';
            // $output .= '<a href="'.route('admin-content-delete', ['id' => $result->id]).'" class="btn btn-sm btn-danger delete-sure">Delete</a>';
            return $output;
            
        })
        ->rawColumns(['created_at', 'action', 'status'])
        ->make(true);
    }

    public function statusChange(Request $request)
    {
    	// dd($request->status);
    	$Content = Content::find($request->id);
    	$Content->status = $request->status;
    	$Content->save();
    	return redirect()->back()->with('success_message', 'status updated');
    }

    public function delete(Request $request)
    {
    	Content::find($request->id)->delete();
    	return redirect()->back()->with('success_message', 'Content deleted successfully');
    }

    public function add()
    {
    	$data['title'] = "Add New Content";
    	return view('admin.content.add', $data);
    }
    public function addAction(Request $request)
    {
    	$this->validate($request, [	        
	        'title' => 'required|max:255|unique:contents',
	        'description' => 'required',
	    ]);
	    $Content = new Content();
	    $Content->title = $request->title;
	    $Content->description = $request->description;
	    $Content->created_by = Auth::guard('admin')->user()->id;
	    $Content->status = true;
	    $Content->save();

	    return redirect()->back()->with('success_message', 'Content successfully added !!');
    } 
    public function edit(Request $request)
    {
    	$data['title'] = "Update Content";
    	$data['details'] = Content::find($request->id);
    	return view('admin.content.edit', $data);
    }
    public function editAction(Request $request)
    {
    	$this->validate($request, [	        
	        'title' => 'required|max:255|unique:contents,title,'.$request->id,
	        'description' => 'required',
	    ]);
	    $Content = Content::find($request->id);
	    $Content->title = $request->title;
	    $Content->description = $request->description;
	    $Content->save();

	    return redirect()->back()->with('success_message', 'Content successfully updated !!');
    }
}