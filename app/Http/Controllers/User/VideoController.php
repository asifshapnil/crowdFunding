<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-18 15:04:43
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-18 15:25:34
 */


namespace App\Http\Controllers\User;
use Illuminate\Http\Request;

use App\Models\Video;
use App\Models\VideoWatch;
use App\User;

use Yajra\Datatables\Facades\Datatables;

use App\Http\Controllers\Controller;

use Auth;

class VideoController extends Controller
{
	public function __construct()
    {
        
    }

    public function index()
    {
    	$data['video'] = Video::where('status', 1)->with('videoWatch')->get()->sortBy(function($query)
					{
					    return $query->videoWatch->where('user_id', Auth::user()->id)->count();
					});
    	// dd($video);
    	return view('user.video', $data);
    }

    public function videoWatch(Request $request)
    {
    	$id = $request->id;
    	$video = Video::find($id);
    	$user_id = Auth::user()->id;
    	$check = VideoWatch::where('user_id', $user_id)->where('video_id', $id)->count();
    	if($check <= 0){
    		$VideoWatch = new VideoWatch();
    		$VideoWatch->user_id = $user_id;
    		$VideoWatch->video_id = $id;
    		$VideoWatch->point_given = $video->point;
    		$VideoWatch->save();

    		$User = User::find($user_id);
    		$User->point += $video->point;
    		$User->save();
    	}
    	return redirect()->back()->with('success_message', 'Video watch reward added !!');

    }
}