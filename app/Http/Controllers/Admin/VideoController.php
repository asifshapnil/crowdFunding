<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-18 15:04:43
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-18 15:25:34
 */


namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\Models\Video;

use Yajra\Datatables\Facades\Datatables;

use App\Http\Controllers\Controller;

use Auth;

class VideoController extends Controller
{
	public function __construct()
    {
        
    }

    public function categoryList()
    {
    	$data['title'] = "Video List";
    	return view('admin.videos.list', $data);
    }

    public function data(Request $request)
    {
    	$Video = Video::all();

    	// dd($Video[0]->createdBy->name);

        return Datatables::of($Video)

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
                $output .= '<a href="'.route('admin-videos-status-change', ['id' => $result->id, 'status'=> 1]).'" class="btn btn-sm btn-success">Enable</a> ';
            }
            else{
                $output .= '<a href="'.route('admin-videos-status-change', ['id' => $result->id, 'status'=> 0]).'" class="btn btn-sm btn-danger">Disable</a> ';
            }
            $output .= '<a href="'.route('admin-videos-edit', ['id' => $result->id]).'" class="btn btn-sm btn-info">Edit</a> 
                    <a href="'.route('admin-videos-delete', ['id' => $result->id]).'" class="btn btn-sm btn-danger delete-sure">Delete</a>';
            return $output;
            
        })
        ->rawColumns(['created_at', 'action', 'status'])
        ->make(true);
    }

    public function statusChange(Request $request)
    {
    	// dd($request->status);
    	$Video = Video::find($request->id);
    	$Video->status = $request->status;
    	$Video->save();
    	return redirect()->back()->with('success_message', 'status updated');
    }

    public function delete(Request $request)
    {
    	Video::find($request->id)->delete();
    	return redirect()->back()->with('success_message', 'Video deleted successfully');
    }

    public function add()
    {
    	$data['title'] = "Add New Video";
    	return view('admin.videos.add', $data);
    }
    public function addAction(Request $request)
    {
    	$this->validate($request, [	        
            'title' => 'required|max:255',
            'videofile' => 'required|mimes:mov,avi,mpe,mpeg,mpg,movie,qt,flv,mp4,3gp,wmv'
	    ]);

	    $Video = new Video();
        $Video->title = $request->title;
        $Video->point = $request->point;

        $filename = '';
        if ($request->hasFile('videofile')) {
            $extension = $request->videofile->extension();
            $filename = time().rand(1000,9999).'.'.$extension;
            $path = $request->videofile->storeAs('videos', $filename);
        }

	    $Video->file = $filename;
	    $Video->created_by = Auth::guard('admin')->user()->id;
	    $Video->status = $request->status;
	    $Video->save();

	    return redirect()->route('admin-videos-list')->with('success_message', 'Video successfully added !!');
    } 
    public function edit(Request $request)
    {
    	$data['title'] = "Update Video";
    	$data['details'] = Video::find($request->id);
    	return view('admin.videos.edit', $data);
    }
    public function editAction(Request $request)
    {
    	$this->validate($request, [            
            'title' => 'required|max:255',
            //'videofile' => 'mimes:mov,avi,mpe,mpeg,mpg,movie,qt,flv,mp4,3gp,wmv'
        ]);
	    $Video = Video::find($request->id);
        $Video->title = $request->title;
	    $Video->point = $request->point;

        if ($request->hasFile('videofile')) {
            $extension = $request->videofile->extension();
            $filename = time().rand(1000,9999).'.'.$extension;
            $path = $request->videofile->storeAs('videos', $filename);
            $Video->file = $filename;
        }

        
        $Video->created_by = Auth::guard('admin')->user()->id;
        $Video->status = $request->status;
        $Video->save();

	    return redirect()->route('admin-videos-list')->with('success_message', 'Video successfully updated !!');
    }
}