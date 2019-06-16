<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-18 12:06:40
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-18 15:26:28
 */


namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Controllers\Controller;

use Auth;

class ProductController extends Controller
{
	public function __construct()
    {
        
    }

    public function productList(Request $request)
    {
        $data['title'] = "Product List";
        $data['user_id'] = 0;
        $data['category_id'] = 0;
    	$data['subcategory_id'] = 0;
        $data['status'] = null;
        if(!empty($request->user_id)){
            $data['user_id'] = $request->user_id;
        }
        if(!empty($request->category_id)){
            $data['category_id'] = $request->category_id;
        }
        if(!empty($request->subcategory_id)){
            $data['subcategory_id'] = $request->subcategory_id;
        }
        if($request->status !== null){
            $data['status'] = $request->status;
        }
    	return view('admin.product.list', $data);
    }

    public function data(Request $request)
    {
    	$query = Product::query();
        if(!empty($request->user_id)){
            $query->where('user_id', $request->user_id);
        }
        if(!empty($request->category_id)){
            $subcategories = ProductSubcategory::where('category_id', $request->category_id)->get()->pluck('id');
            $query->whereIn('subcategory_id', $subcategories);
        }
        if(!empty($request->subcategory_id)){
            $query->where('subcategory_id', $request->subcategory_id);
        }
        if($request->status !== null){
            $query->where('status', $request->status);
        }
        $Product = $query->get();
    	// dd($ProjectCategory[0]->createdBy->name);

        return Datatables::of($Product)

        ->editColumn('created_at', '{!! date("j M Y h:i A", strtotime($created_at)) !!}')
        ->addColumn('created_by', function ($result) {
            return $result->user->first_name.' '.$result->user->last_name;
        })
        /*->addColumn('category', function ($result) {
            return $result->subCategory->category->name;
        })
        ->addColumn('total_sell_amount', function ($result) {
            return $result->orderDetails->sum('total_point');
        })
        ->addColumn('total_sell_point', function ($result) {
            return $result->orderDetails->sum('total_point');
        })
        ->addColumn('sell_count', function ($result) {
            return $result->orderDetails->count();
        })
        ->editColumn('is_featured', function ($result) {
            if ($result->is_featured==0) {
                return '<span class="text-danger">Not Featured</span>';
            }
            else{
                return '<span class="text-success">Featured</span>';
            }
        })*/
        ->addColumn('title', function ($result) {
            return '<a href="'.route('admin-product-details',['id'=>$result->id]).'">'.$result->title.'</a>';
        })
        ->editColumn('status', function ($result) {
            if ($result->status==0) {
                return '<span class="text-info">Pending</span>';
            }
            else if ($result->status==1) {
                return '<span class="text-success">Active</span>';
            }
            else if ($result->status==2) {
                return '<span class="text-primary">Out of Stock</span>';
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

            if ($result->is_featured==0) {
                $returnData .= '<a href="'.route('admin-product-feature-status-change',['id'=>$result->id, 'status'=>1]).'" class="btn btn-sm btn-success inline">オススメにする</a> ';
            }
            else{
                $returnData .= '<a href="'.route('admin-product-feature-status-change',['id'=>$result->id, 'status'=>0]).'" class="btn btn-sm btn-danger inline">オススメ削除</a> ';
            }

            if ($result->status==0) {
                $returnData .= '<a href="'.route('admin-product-status-change',['id'=>$result->id, 'status'=>1]).'" class="btn btn-sm btn-success inline">Active</a> '; //last_interest_at = current date time
                $returnData .= '<a href="'.route('admin-product-status-change',['id'=>$result->id, 'status'=>4]).'" class="btn btn-sm btn-danger inline">Reject</a> ';
            }
            else if ($result->status==1) {
                $returnData .= '<a href="'.route('admin-product-status-change',['id'=>$result->id, 'status'=>3]).'" class="btn btn-sm btn-warning inline">Hold</a> ';
                $returnData .= '<a href="'.route('admin-product-status-change',['id'=>$result->id, 'status'=>4]).'" class="btn btn-sm btn-danger inline">Reject</a> ';
            }
            else if ($result->status==3) {
                $returnData .= '<a href="'.route('admin-product-status-change',['id'=>$result->id, 'status'=>1]).'" class="btn btn-sm btn-success inline">Active</a> ';
                $returnData .= '<a href="'.route('admin-product-status-change',['id'=>$result->id, 'status'=>4]).'" class="btn btn-sm btn-danger inline">Reject</a> ';
            }
            else{
                //
            }

            $returnData .= '<a href="'.route('admin-product-delete', ['id' => $result->id]).'" class="btn btn-sm btn-danger delete-sure">Delete</a>';

            return $returnData;
            
        })
        ->rawColumns(['title','created_at', 'created_by', 'action', 'status'])
        ->make(true);
    }

    public function statusChange(Request $request)
    {
        $Product = Product::find($request->id);
        $Product->status = $request->status;
        $Product->save();
        return redirect()->back()->with('success_message', 'status updated');
    }
    public function featureStatusChange(Request $request)
    {
        $Product = Product::find($request->id);
        $Product->is_featured = $request->status;
        $Product->save();
        return redirect()->back()->with('success_message', 'status updated');
    }

    public function delete(Request $request)
    {
        Product::find($request->id)->delete();
        return redirect()->back()->with('success_message', 'Product deleted successfully');
    }
    
    public function details(Request $request)
    {
        $data['product'] = Product::find($request->id);

        return view('admin.product.details', $data);
    }
}