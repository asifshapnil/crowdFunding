<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-18 15:04:43
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-18 15:25:34
 */


namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\Models\ProductCategory;

use Yajra\Datatables\Facades\Datatables;

use App\Http\Controllers\Controller;

use Auth;

class ProductCategoryController extends Controller
{
	public function __construct()
    {
        
    }

    public function categoryList()
    {
    	$data['title'] = "カタログカテゴリ一覧";
    	return view('admin.product_category.list', $data);
    }

    public function data(Request $request)
    {
    	$ProductCategory = ProductCategory::withCount('products')->get();

    	// dd($ProductCategory[0]->createdBy->name);

        return Datatables::of($ProductCategory)

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
            return '<a href="'.route('admin-product-list',['category_id'=>$result->id]).'">'.$result->name.'</a>';
        })
        ->editColumn('products_count', function ($result) {
            return '<a href="'.route('admin-product-list',['category_id'=>$result->id]).'">'.$result->products_count.'</a>';
        })
        ->addColumn('action', function ($result) {
            $output = '';
            if ($result->status==0) {
                $output .= '<a href="'.route('admin-product-category-status-change', ['id' => $result->id, 'status'=> 1]).'" class="btn btn-sm btn-success">Enable</a> ';
            }
            else{
                $output .= '<a href="'.route('admin-product-category-status-change', ['id' => $result->id, 'status'=> 0]).'" class="btn btn-sm btn-danger">Disable</a> ';
            }
            $output .= '<a href="'.route('admin-product-category-edit', ['id' => $result->id]).'" class="btn btn-sm btn-info">Edit</a> 
                    <a href="'.route('admin-product-category-delete', ['id' => $result->id]).'" class="btn btn-sm btn-danger delete-sure">Delete</a>';
            return $output;
            
        })
        ->rawColumns(['name','products_count','created_at', 'action', 'status'])
        ->make(true);
    }

    public function statusChange(Request $request)
    {
    	// dd($request->status);
    	$ProductCategory = ProductCategory::find($request->id);
    	$ProductCategory->status = $request->status;
    	$ProductCategory->save();
    	return redirect()->back()->with('success_message', 'status updated');
    }

    public function delete(Request $request)
    {
    	ProductCategory::find($request->id)->delete();
    	return redirect()->back()->with('success_message', 'Product category deleted successfully');
    }

    public function add()
    {
    	$data['title'] = "Add New Product Category";
    	return view('admin.product_category.add', $data);
    }
    public function addAction(Request $request)
    {
    	$this->validate($request, [	        
	        'name' => 'required|max:255|unique:product_category'
	    ]);
	    $ProductCategory = new ProductCategory();
	    $ProductCategory->name = $request->name;
	    $ProductCategory->created_by = Auth::guard('admin')->user()->id;
	    $ProductCategory->status = true;
	    $ProductCategory->save();

	    return redirect()->back()->with('success_message', 'Product category successfully added !!');
    } 
    public function edit(Request $request)
    {
    	$data['title'] = "Update Product Category";
    	$data['details'] = ProductCategory::find($request->id);
    	return view('admin.product_category.edit', $data);
    }
    public function editAction(Request $request)
    {
    	$this->validate($request, [	        
	        'name' => 'required|max:255|unique:product_category,name,'.$request->id
	    ]);
	    $ProductCategory = ProductCategory::find($request->id);
	    $ProductCategory->name = $request->name;
	    $ProductCategory->save();

	    return redirect()->back()->with('success_message', 'Product category successfully updated !!');
    }
}