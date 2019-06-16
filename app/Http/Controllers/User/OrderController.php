<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-16 13:37:36
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-16 13:37:41
 */

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use App\Models\Product;
use App\Models\FavouriteProduct;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\UserCard;
use App\Models\ProductColor;
use App\Models\ProductRank;
use App\User;

use Auth;
use Cart;
use Image;

use Yajra\Datatables\Facades\Datatables;

class OrderController extends Controller
{
	public function __construct()
    {

    }

    public function index()
    {
        $data['OrderDetail'] = OrderDetail::whereHas('product', function($q){
                            $q->where('user_id', Auth::user()->id);
                        })->paginate(10);
    	return view('user.my_order_list', $data);
    }

    public function data()
    {
        $OrderDetail = OrderDetail::whereHas('product', function($q){
                            $q->where('user_id', Auth::user()->id);
                        })->get();

        return Datatables::of($OrderDetail)

        ->editColumn('created_at', '{!! date("j M Y h:i A", strtotime($created_at)) !!}')
        ->addColumn('order_by', function ($result) {
            return $result->order->order_by->first_name.' '.$result->order->order_by->last_name;
        })
        ->editColumn('order_no', function ($result) {
            return '<a href="'.route('user-order-details',['id'=>$result->order->id]).'" target="_blank">'.$result->order->order_no.'</a>';
        })
				->editColumn('price', function ($result) {
						return '<p>'.$result->product->price.'</p>';
				})
        ->editColumn('status', function ($result) {
            if ($result->status==0) {
                return '<span class="text-info">Pending</span>';
            }
            else if ($result->status==1) {
                return '<span class="text-success">Active</span>';
            }
            else if ($result->status==2) {
                return '<span class="text-primary">Delivered</span>';
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
        ->addColumn('action', function ($result) {
            $returnData = '';

            if ($result->status==0) {
                $returnData .= '<div class="dropdown">
																  <button class="dropbtn btn  btn-sm">Action</button>
																  <div class="dropdown-content">
																		<a href="'.route('user-order-status-change',['id'=>$result->id, 'status'=>1]).'" class="">Active</a>
																	  <a href="'.route('user-order-status-change',['id'=>$result->id, 'status'=>4]).'" class="">Reject</a>
	 															</div> </div>'; //last_interest_at = current date time
                // $returnData .= '';
            }
            else if ($result->status==1) {
                $returnData .= '<div class="dropdown">
																  <button class="dropbtn btn  btn-sm mr-1">Action</button>
																  <div class="dropdown-content">
																    <a href="'.route('user-order-status-change',['id'=>$result->id, 'status'=>2]).'" >Delivered</a>
																    <a href="'.route('user-order-status-change',['id'=>$result->id, 'status'=>3]).'">Hold</a>
																    <a href="'.route('user-order-status-change',['id'=>$result->id, 'status'=>4]).'">Reject</a>
																  </div>
																</div>';
                // $returnData .= '';
                // $returnData .= '';
            }
            else if ($result->status==3) {
                $returnData .= '<div class="dropdown">
															  <button class="dropbtn btn  btn-sm">Action</button>
															  <div class="dropdown-content">
																	<a href="'.route('user-order-status-change',['id'=>$result->id, 'status'=>1]).'" >Active</a>
																	<a href="'.route('user-order-status-change',['id'=>$result->id, 'status'=>4]).'">Reject</a>
															</div> </div> ';
                // $returnData .= '';
            }
            else{
                //
            }

            return $returnData;

        })
        ->rawColumns(['order_no','created_at', 'order_by', 'action', 'status','price'])
        ->make(true);
    }

    public function data2()
    {
        $OrderDetail = OrderDetail::leftJoin('orders', 'orders.id','=','order_details.order_id')
                            ->leftJoin('users', 'users.id','=','orders.user_id')
                            ->leftJoin('products', 'products.id','=','order_details.product_id')
                            ->whereIn('order_details.product_id', Product::where('user_id', Auth::user()->id)->get()->pluck(['id']))
                            ->select(['*','order_details.status as status','order_details.id as order_details_id'])
                            ->get();

        return Datatables::of($OrderDetail)

        ->editColumn('created_at', '{!! date("j M Y h:i A", strtotime($created_at)) !!}')
        ->addColumn('order_by', function ($result) {
            return $result->first_name.' '.$result->last_name;
        })
        ->editColumn('title', function ($result) {
            return '<a href="'.route('front-product-details',['id'=>$result->id]).'" target="_blank">'.$result->title.'</a>';
        })
        ->editColumn('status', function ($result) {
            if ($result->status==0) {
                return '<span class="text-info">Pending</span>';
            }
            else if ($result->status==1) {
                return '<span class="text-success">Active</span>';
            }
            else if ($result->status==2) {
                return '<span class="text-primary">Delivered</span>';
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
        ->addColumn('action', function ($result) {
            $returnData = '';

            if ($result->status==0) {

                $returnData .= '<div class="dropdown">
		    <button class="dropbtn">Dropdown
		      <i class="fa fa-caret-down"></i>
		    </button>
		    <div class="dropdown-content"><a href="'.route('user-order-status-change',['id'=>$result->order_details_id, 'status'=>1]).'" class="">Active</a> <a href="'.route('user-order-status-change',['id'=>$result->order_details_id, 'status'=>4]).'" class="">R</a>    </div>
			  </div>'; //last_interest_at = current date time
                // $returnData .= '<a href="'.route('user-order-status-change',['id'=>$result->order_details_id, 'status'=>4]).'" class="btn btn-sm btn-danger inline">Reject</a> ';
            }
            else if ($result->status==1) {
                $returnData .= '<div class="dropdown">
		    <button class="dropbtn">Dropdown
		      <i class="fa fa-caret-down"></i>
		    </button>
		    <div class="dropdown-content"><a href="'.route('user-order-status-change',['id'=>$result->order_details_id, 'status'=>3]).'" class="">Hold</a> <a href="'.route('user-order-status-change',['id'=>$result->order_details_id, 'status'=>4]).'" class="">R</a> </div></div>';
                // $returnData .= '<a href="'.route('user-order-status-change',['id'=>$result->order_details_id, 'status'=>4]).'" class="btn btn-sm btn-danger inline">Reject</a> ';
            }
            else if ($result->status==3) {
                $returnData .= '<div class="dropdown">
		    <button class="dropbtn">Dropdown
		      <i class="fa fa-caret-down"></i>
		    </button>
		    <div class="dropdown-content"><a href="'.route('user-order-status-change',['id'=>$result->order_details_id, 'status'=>1]).'" class="">Active</a>   </div>  </div>';
                // $returnData .= '<a href="'.route('user-order-status-change',['id'=>$result->order_details_id, 'status'=>4]).'" class="btn btn-sm btn-danger inline">Reject</a> ';
            }
            else{
                //
            }

            return $returnData;

        })
        ->rawColumns(['order_no','created_at', 'order_by', 'action', 'status'])
        ->make(true);
    }

    public function statusChange(Request $request)
    {
        $OrderDetail = OrderDetail::find($request->id);
				// dd($request->status);
        $OrderDetail->status = $request->status;
        $OrderDetail->save();
        return redirect()->back()->with('success_message', 'status updated');
    }
		public function orderStatusChange(Request $request)
    {
        $Order = Order::find($request->id);
				// dd($request->status);
        $Order->status = $request->status;
        $Order->save();
        return redirect()->back()->with('success_message', 'status updated');
    }

		public function shippingInfo(Request $request){
			$Order = Order::where('id', $request->id)->first();
			$Order->document_number = $request->document_number;
			$Order->shipping_company = $request->shipping_company;
			$Order->save();
			if ($request->detail_id) {
				return redirect()-> route('user-order-status-change',['id'=>$request->detail_id, 'status'=>$request->status]);
			}
			return redirect()-> route('user-order-details-status-change',['id'=>$request->id, 'status'=>$request->status]);

				// code...

			// return ($request->status);
			// return ($request->id);

		}
		public function orderCancel(Request $request){
			$Order = Order::where('id', $request->id)->first();
			$Order->cancel_content = $request->cancel_content;
			$Order->save();
			if ($request->detail_id) {
				return redirect()-> route('user-order-status-change',['id'=>$request->detail_id, 'status'=>$request->status]);
			}
			// dd($request->status);
			return redirect()-> route('user-order-details-status-change',['id'=>$request->id, 'status'=>$request->status]);

			// return ($request->status);
			// return ($request->id);

		}

    public function orderDetails(Request $request)
    {
				$data['order'] = Order::where('id', $request->id)->first();
				$data['orderDetails'] = OrderDetail::where('order_id', $request->id)->whereHas('product', function($q){
                            $q->where('user_id', Auth::user()->id);
                        })->get();
				// dd($data['orderDetails']);

        return view('user.my_order_details', $data);
    }

}
