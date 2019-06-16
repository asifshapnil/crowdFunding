<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-18 15:04:43
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-18 15:25:34
 */


namespace App\Http\Controllers\User;
use Illuminate\Http\Request;

use App\Models\UserCard;

use Yajra\Datatables\Facades\Datatables;

use App\Http\Controllers\Controller;

use Auth;

class CardController extends Controller
{
	public function __construct()
    {
        
    }

    public function index()
    {
    	$data['title'] = "User Card List";
    	return view('user.cards.list', $data);
    }

    public function data(Request $request)
    {
    	$UserCard = UserCard::where('user_id', Auth::user()->id)->get();

        return Datatables::of($UserCard)
        ->editColumn('created_at', '{!! date("j M Y h:i A", strtotime($created_at)) !!}')
        ->editColumn('status', function ($result) {
            if ($result->status==0) {
                return '<span class="text-danger">Disabled</span>';
            }
            else{
                return '<span class="text-success">Enabled</span>';
            }
        })->editColumn('number', function ($result) {
            return substr_replace($result->number, str_repeat("X", 8), 4, 8);
        })
        ->addColumn('action', function ($result) {
            $output = '';
            if ($result->status==0) {
                $output .= '<a href="'.route('user-cards-status-change', ['id' => $result->id, 'status'=> 1]).'" class="btn btn-xs btn-sm btn-success">Enable</a> ';
            }
            else{
                $output .= '<a href="'.route('user-cards-status-change', ['id' => $result->id, 'status'=> 0]).'" class="btn btn-xs btn-sm btn-danger">Disable</a> ';
            }
            $output .= '<a href="'.route('user-cards-edit', ['id' => $result->id]).'" class="btn btn-xs btn-sm btn-info">Edit</a> 
                    <a href="'.route('user-cards-delete', ['id' => $result->id]).'" class="btn btn-xs btn-sm btn-danger delete-sure">Delete</a>';
            return $output;
            
        })
        ->rawColumns(['created_at', 'action', 'status'])
        ->make(true);
    }

    public function statusChange(Request $request)
    {
    	// dd($request->status);
    	$UserCard = UserCard::find($request->id);
    	$UserCard->status = $request->status;
    	$UserCard->save();
    	return redirect()->back()->with('success_message', 'Card Status Updated Successfully.');
    }

    public function delete(Request $request)
    {
    	UserCard::find($request->id)->delete();
    	return redirect()->back()->with('success_message', 'Card Successfully Deleted.');
    }

    public function add()
    {
    	$data['title'] = "Add New Card";
    	return view('user.cards.add', $data);
    }
    public function addAction(Request $request)
    {
    	$this->validate($request, [	        
            'name' => 'required',
            'number' => 'required',
	        'cvv' => 'required'
	    ]);
	    $UserCard = new UserCard();
        $UserCard->user_id = Auth::user()->id;
        $UserCard->name = $request->name;
        $UserCard->number = $request->number;
        $UserCard->cvv = $request->cvv;
        $UserCard->exp_month = $request->exp_month;
	    $UserCard->exp_year = $request->exp_year;
	    $UserCard->status = true;
	    $UserCard->save();

	    return redirect()->route('user-cards-list')->with('success_message', 'Card Successfully Added !!');
    } 
    public function edit(Request $request)
    {
    	$data['title'] = "Update Card";
    	$data['details'] = UserCard::find($request->id);
    	return view('user.cards.edit', $data);
    }
    public function editAction(Request $request)
    {
    	$this->validate($request, [
	        'name' => 'required',
            'number' => 'required',
            'cvv' => 'required'
	    ]);
	    $UserCard = UserCard::find($request->id);
	    $UserCard->name = $request->name;
        $UserCard->number = $request->number;
        $UserCard->cvv = $request->cvv;
        $UserCard->exp_month = $request->exp_month;
        $UserCard->exp_year = $request->exp_year;
	    $UserCard->save();

	    return redirect()->route('user-cards-list')->with('success_message', 'Card successfully updated !!');
    }
}