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
use App\Models\Message;

use App\Models\UserCard;
use App\Models\ProductColor;
use App\Models\ProductRank;
use App\Models\Product_rating;

use App\User;

use Auth;
use Cart;
use Image;

class ProductController extends Controller
{
	public function __construct()
    {

    }

    public function purchaseList(Request $request)
    {
    	$data['products'] = Product::where('status', 1)->whereHas('orderDetails', function ($query) {
            $query->whereHas('order', function($query1){
                $query1->where('user_id', Auth::user()->id);
            });
        })->with('orderDetails')->get();
        // dd($data);
				$data['messages'] = Message::where('to_id', Auth::user()->id)->get();
				$data['OrderDetails'] = OrderDetail::where('status', 0)->whereHas('product', function($q){
                            $q->where('user_id', Auth::user()->id);
                        })->get();
        return view('user.my-purchase-list', $data);
    }

		public function productRating(Request $request){
			$checkIfRatings = Product_rating::where('product_id', $request->product_id)->where('user_id', Auth::user()->id)->first();
			if ($checkIfRatings) {
				$checkIfRatings->user_rating = $request->user_rating;
				$checkIfRatings->save();
				return redirect()->back();

			}
			$ratings = new Product_rating();
			$ratings->user_id = Auth::user()->id;
			$ratings->product_id = $request->product_id;
			$ratings->user_rating = $request->user_rating;

			$ratings->save();
			return redirect()->back();
		}

    public function index()
    {
        $data['products'] = Product::where('user_id', Auth::user()->id)->get();
				$data['messages'] = Message::where('to_id', Auth::user()->id)->get();
				$data['OrderDetails'] = OrderDetail::where('status', 0)->whereHas('product', function($q){
														$q->where('user_id', Auth::user()->id);
												})->get();
    	return view('user.my_product_list', $data);
    }

    public function preNew()
    {
    	return view('user.pre_new_product');
    }
    public function add(Request $request)
    {
        $finish = false;
        if($request->finish){
            $finish = true;
        }
        $data['finish'] = $finish;
        $data['category'] = ProductCategory::where('status', 1)->get();
        $data['subcategory'] = ProductSubcategory::where('status', 1)->get();
    	return view('user.new_product', $data);
    }
    public function addAction(Request $request)
    {
        //dd($request->hasFile('other_file.0'));
        $Product = new Product();
        $Product->title = $request->title;

        if ($request->hasFile('image')) {
            $extension = $request->image->extension();
            $name = time().rand(1000,9999).'.'.$extension;
            $img = Image::make($request->image);
            $img->save(public_path().'/uploads/products/'.$name, 60);
            // $path = $request->image->storeAs('products', $name);
        }

        $Product->image = $name;
        $Product->user_id = Auth::user()->id;
        $Product->subcategory_id = $request->subcategory;
        $Product->price = $request->price;
        // if(!empty($request->colors)){
        //     $colors = explode(',', $request->colors);
        //     $colors = json_encode($colors);
        //     $Product->colors = $colors;
        // }
        $Product->description = $request->description;
        $Product->explanation = $request->explanation;
        // if ($request->hasFile('explanation_image')) {
        //     $extension = $request->explanation_image->extension();
        //     $name = time().rand(1000,9999).'.'.$extension;
        //     $img = Image::make($request->explanation_image)->resize(300, 300);
        //     $img->save(public_path().'/uploads/products/'.$name, 60);
        //     // $path = $request->image->storeAs('products', $name);
        //     $Product->explanation_image = $name;
        // }

        $Product->company_name = $request->company_name;
        $Product->company_info = $request->company_info;
        if ($request->hasFile('company_info_image')) {
            $extension = $request->company_info_image->extension();
            $name = time().rand(1000,9999).'.'.$extension;
            $img = Image::make($request->company_info_image)->resize(300, 300);
            $img->save(public_path().'/uploads/products/'.$name, 60);
            // $path = $request->image->storeAs('products', $name);
            $Product->company_info_image = $name;
        }

        // $Product->profile_info = $request->profile_info;
        $Product->profile_info = '';
        /*if ($request->hasFile('profile_info_image')) {
            $extension = $request->profile_info_image->extension();
            $name = time().rand(1000,9999).'.'.$extension;
            $img = Image::make($request->profile_info_image)->resize(300, 300);
            $img->save(public_path().'/uploads/products/'.$name, 60);
            // $path = $request->image->storeAs('products', $name);
            $Product->profile_info_image = $name;
        }*/


        /*$Product->payment_option = $request->payment_option;
        $Product->account_option = $request->account_option;
        $Product->bank_name = $request->bank_name;
        $Product->bank_code = $request->bank_code;
        $Product->branch_name = $request->branch_name;
        $Product->account_number = $request->account_number;
        $Product->account_name = $request->account_name;

        $Product->shipping_option = $request->shipping_option;
        $Product->shipping_option_details = $request->shipping_option_details;
        $Product->shipping_option_foreign = $request->shipping_option_foreign;
        $Product->shipping_option_foreign_details = $request->shipping_option_foreign_details;

        $Product->monday = isset($request->monday)?1:0;
        $Product->tuesday = isset($request->tuesday)?1:0;
        $Product->wednesday = isset($request->wednesday)?1:0;
        $Product->thursday = isset($request->thursday)?1:0;
        $Product->thursday = isset($request->thursday)?1:0;
        $Product->friday = isset($request->friday)?1:0;
        $Product->saturday = isset($request->saturday)?1:0;
        $Product->sunday = isset($request->sunday)?1:0;
        $Product->holyday = isset($request->holyday)?1:0;
        $Product->other_day = isset($request->other_day)?1:0;
        $Product->other_day_details = $request->other_day_details;
        $Product->delivery_day = $request->delivery_day;
        $Product->delivery_day_details = $request->delivery_day_details;*/

        /*if(empty($request->card)){
            $UserCard = new UserCard();
            $UserCard->user_id = Auth::user()->id;
            $UserCard->name = $request->name;
            $UserCard->number = $request->number;
            $UserCard->cvv = $request->cvv;
            $UserCard->exp_month = $request->exp_month;
            $UserCard->exp_year = $request->exp_year;
            $UserCard->save();
            $Product->card_id = $UserCard->id;
        }else{
            $Product->card_id = $request->card;
        }*/




        $Product->status = 0;
        $Product->save();

        foreach ($request->color as $key => $value) {
            if(!empty($value) && !empty($request->type[$key])){
            // if(!empty($value) && !empty($request->type[$key]) && !empty($request->individual[$key])){
                $ProductColor = new ProductColor();
                $ProductColor->product_id = $Product->id;
                $ProductColor->color = $value;
                $ProductColor->type = $request->type[$key];
                $ProductColor->save();
            }
        }

        // return redirect()->to(route('user-my-page'));
        return redirect()->to(route('user-product-add', ['finish' => 1]));
    }
    public function edit(Request $request)
    {
        $finish = false;

        if($request->finish){
            $finish = true;
        }
        $data['finish'] = $finish;
        $data['category'] = ProductCategory::where('status', 1)->get();
        $data['subcategory'] = ProductSubcategory::where('status', 1)->get();
        $data['product'] = Product::where('id', $request->id)->first();
        // dd($request);
    	return view('user.edit_product', $data);
    }
    public function editAction(Request $request)
    {
        //dd($request->hasFile('other_file.0'));
        $Product = Product::where('id', $request->id)->first();
        $Product->title = $request->title;

        if ($request->hasFile('image')) {
            $extension = $request->image->extension();
            $name = time().rand(1000,9999).'.'.$extension;
            $img = Image::make($request->image);
            $img->save(public_path().'/uploads/products/'.$name, 60);
            // $path = $request->image->storeAs('products', $name);
        }
        if ($request->hasFile('image')) {
        $Product->image = $name;
        }
        $Product->user_id = Auth::user()->id;
        $Product->subcategory_id = $request->subcategory;
        $Product->price = $request->price;
        // if(!empty($request->colors)){
        //     $colors = explode(',', $request->colors);
        //     $colors = json_encode($colors);
        //     $Product->colors = $colors;
        // }
        $Product->description = $request->description;
        $Product->explanation = $request->explanation;
        // if ($request->hasFile('explanation_image')) {
        //     $extension = $request->explanation_image->extension();
        //     $name = time().rand(1000,9999).'.'.$extension;
        //     $img = Image::make($request->explanation_image)->resize(300, 300);
        //     $img->save(public_path().'/uploads/products/'.$name, 60);
        //     // $path = $request->image->storeAs('products', $name);
        //     $Product->explanation_image = $name;
        // }

        $Product->company_name = $request->company_name;
        $Product->company_info = $request->company_info;
        if ($request->hasFile('company_info_image')) {
            $extension = $request->company_info_image->extension();
            $name = time().rand(1000,9999).'.'.$extension;
            $img = Image::make($request->company_info_image)->resize(300, 300);
            $img->save(public_path().'/uploads/products/'.$name, 60);
            // $path = $request->image->storeAs('products', $name);
            $Product->company_info_image = $name;
        }

        // $Product->profile_info = $request->profile_info;
        $Product->profile_info = '';
        /*if ($request->hasFile('profile_info_image')) {
            $extension = $request->profile_info_image->extension();
            $name = time().rand(1000,9999).'.'.$extension;
            $img = Image::make($request->profile_info_image)->resize(300, 300);
            $img->save(public_path().'/uploads/products/'.$name, 60);
            // $path = $request->image->storeAs('products', $name);
            $Product->profile_info_image = $name;
        }*/


        /*$Product->payment_option = $request->payment_option;
        $Product->account_option = $request->account_option;
        $Product->bank_name = $request->bank_name;
        $Product->bank_code = $request->bank_code;
        $Product->branch_name = $request->branch_name;
        $Product->account_number = $request->account_number;
        $Product->account_name = $request->account_name;

        $Product->shipping_option = $request->shipping_option;
        $Product->shipping_option_details = $request->shipping_option_details;
        $Product->shipping_option_foreign = $request->shipping_option_foreign;
        $Product->shipping_option_foreign_details = $request->shipping_option_foreign_details;

        $Product->monday = isset($request->monday)?1:0;
        $Product->tuesday = isset($request->tuesday)?1:0;
        $Product->wednesday = isset($request->wednesday)?1:0;
        $Product->thursday = isset($request->thursday)?1:0;
        $Product->thursday = isset($request->thursday)?1:0;
        $Product->friday = isset($request->friday)?1:0;
        $Product->saturday = isset($request->saturday)?1:0;
        $Product->sunday = isset($request->sunday)?1:0;
        $Product->holyday = isset($request->holyday)?1:0;
        $Product->other_day = isset($request->other_day)?1:0;
        $Product->other_day_details = $request->other_day_details;
        $Product->delivery_day = $request->delivery_day;
        $Product->delivery_day_details = $request->delivery_day_details;*/

        /*if(empty($request->card)){
            $UserCard = new UserCard();
            $UserCard->user_id = Auth::user()->id;
            $UserCard->name = $request->name;
            $UserCard->number = $request->number;
            $UserCard->cvv = $request->cvv;
            $UserCard->exp_month = $request->exp_month;
            $UserCard->exp_year = $request->exp_year;
            $UserCard->save();
            $Product->card_id = $UserCard->id;
        }else{
            $Product->card_id = $request->card;
        }*/




        $Product->status = 1;
        $Product->save();

        $ProductColor = ProductColor::where('product_id', $request->id)->delete();
        foreach ($request->color as $key => $value) {
            if(!empty($value) && !empty($request->type[$key])){
            // if(!empty($value) && !empty($request->type[$key]) && !empty($request->individual[$key])){
                $ProductColor = new ProductColor();
                $ProductColor->product_id = $Product->id;
                $ProductColor->color = $value;
                $ProductColor->type = $request->type[$key];
                $ProductColor->save();
            }
        }

        // return redirect()->to(route('user-my-page'));

        return redirect()->to(route('user-product-edit', [ 'id' => $request->id, 'finish' => 1]));
    }

    public function addFavourite(Request $request)
    {

        $id = $request->id;
        $check = FavouriteProduct::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
        if($check) return redirect()->back();
        $FavouriteProduct = new FavouriteProduct();
        $FavouriteProduct->user_id = Auth::user()->id;
        $FavouriteProduct->product_id = $id;
        $FavouriteProduct->save();
        return redirect()->back();
    }

    public function favouriteList(Request $request)
    {
        $data['products'] = FavouriteProduct::where('status', 1)->where('user_id', Auth::user()->id)->get();
        return view('user.favourite_product_list', $data);
    }

    public function removeFavourite(Request $request)
    {
        $id = $request->id;
        FavouriteProduct::where('product_id', $id)->where('user_id', Auth::user()->id)->delete();
        return redirect()->back();
    }

    public function payment(Request $request)
    {
        dd($request);
    }

    public function purchase(Request $request)
    {

				Cart::update($request->row_id, $request->quantity);

        // dd(Cart::content());
				// return 'hello';


        $order_no = 'ORD-'.time().Auth::user()->id.rand(1000,9999);
        $remaining = 0;
        $cartSubtotal = (float)Cart::subtotal(false, false, false);
        $accountPoint = $cartSubtotal;
        if($cartSubtotal > Auth::user()->point){
            $remaining = $cartSubtotal-Auth::user()->point;
            $accountPoint = Auth::user()->point;
        }

        if(empty($request->card)){
            $c_name = $request->name;
            $c_exp_month = $request->exp_month;
            $c_number = $request->number;
            $c_cvv = $request->cvv;
            $c_exp_year = $request->exp_year;
        }else{
            $UserCard = UserCard::find($request->card);
            $c_name = $UserCard->name;
            $c_exp_month = $UserCard->exp_month;
            $c_number = $UserCard->number;
            $c_cvv = $UserCard->cvv;
            $c_exp_year = $UserCard->exp_year;
        }

        // dd($remaining, $c_number);

        if($remaining > 0 && !empty($c_number)){
            $data = [
                    'amount' => $remaining,
                    'currency' => 'JPY',
                    'metadata' => [
                        'order_no' => $order_no
                    ],
                    'payment_details' => [
                        'family_name' => Auth::user()->first_name.' '.Auth::user()->last_name,
                        'given_name' => $c_name,
                        'month' => $c_exp_month,
                        'number' => $c_number,
                        'type' => 'credit_card',
                        'verification_value' => $c_cvv,
                        'year' => $c_exp_year
                    ]
            ];

            // $ch = curl_init();
            // curl_setopt($ch, CURLOPT_URL,"https://sandbox.komoju.com/api/v1/payments");
            // curl_setopt($ch, CURLOPT_USERNAME, 'sk_a9c133483cba199c92e5e5b38f71d47e5b3c16e6');
            // curl_setopt($ch, CURLOPT_POST, 1);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // $server_output = curl_exec ($ch);
            // curl_close ($ch);
            // $server_output = json_decode($server_output);
            // if(isset($server_output->status) && $server_output->status == 'captured'){

            // }else{
            //     return redirect()->back()->with('error', 'payment failed');
            // }




            // GMO

            $shopId = 'tshop00031453';
            $shopName = 'Road Frontier Co';
            $shopPassword = 'xup3mw85';

            // \GMO\API\Defaults::setShopID($shopId);
            // \GMO\API\Defaults::setShopName($shopName);
            // \GMO\API\Defaul ts::setPassword($shopPassword);
            define('GMO_SHOP_ID', $shopId); // ショップＩＤ
            define('GMO_SHOP_PASSWORD', $shopPassword); // ショップ名
            define('GMO_SHOP_NAME', $shopName); // ショップパスワード
            define('GMO_TRIAL_MODE', true);


            // A wrapper object that does everything for you.
            $payment = new \GMO\ImmediatePayment();
             // Unique ID for every payment; probably should be taken from an auto-increment field from the database.
            $payment->paymentId = $order_no;
            $payment->amount = $remaining;
            // This card number can be used for tests.
            $payment->cardNumber = $c_number;
            // A date in the future.
            $payment->cardYear = $c_exp_year;
            $payment->cardMonth = $c_exp_month;
            $payment->cardCode = $c_cvv;

            // Returns false on an error.
            if (!$payment->execute()) {
                $errors = $payment->getErrors();
                // return redirect()->back()->with('error_message', 'payment failed');
                foreach ($errors as $errorCode => $errorDescription) {
                    // Show an error code and a description to the customer? Your choice.
                    // Probably you want to log the error too.
                }
                // return;
            }

            // Success!
            $response = $payment->getResponse();
            // dd($response);

            // GMO END
        }





        $Order = new Order();
        $Order->user_id = Auth::user()->id;
        $Order->order_no = $order_no;
        $Order->qty = Cart::count();
        $Order->total_point = $cartSubtotal;
        $Order->account_point = $accountPoint;
        $Order->purchase_point = $remaining;
        // $Order->delivery_option = $request->delivery_option;
        $Order->delivery_option = '1';
        // $Order->delivery_date = $request->delivery_date;
        $Order->delivery_date = '2012-12-12';
        // $Order->delivery_time = $request->delivery_time;
        $Order->delivery_time = time();
        $Order->name = $request->name;
        $Order->number = $request->number;
        $Order->cvv = $request->cvv;
        $Order->exp_month = $request->exp_month;
        $Order->custom_postal_code = $request->postal_code;
				$Order->custom_municipility = $request->municipility;
				$Order->custom_address = $request->address;
				$Order->custom_room_no = $request->room_no;
				$Order->custom_phone_no = $request->phone_num;

        $Order->save();


        foreach(Cart::content() as $p) {
            $OrderDetail = new OrderDetail();
            $OrderDetail->order_id = $Order->id;
            $OrderDetail->product_id = $p->id;
            $OrderDetail->qty = $p->qty;
            $OrderDetail->unit_point = $p->price;
            $OrderDetail->total_point = $p->price*$p->qty;
            $OrderDetail->status = 1;
            $OrderDetail->save();
        }

        $User = User::find(Auth::user()->id);
        $User->point -= $accountPoint;
        $User->save();

        Cart::destroy();
				return redirect()->to(route('front-cart', ['finish' => true]));
				// return redirect()->route('show-message');
				// dd('hi');
  }

    public function getSubCategory(Request $request)
    {
        $id = $request->id;
        $data['sub_category'] = ProductSubcategory::where('category_id', $id)->where('status', 1)->get();
        return view('user.sub_category', $data);
    }

    public function sendRank(Request $request)
    {
        $product_id = $request->product_id;
        $rank = $request->rank;
        ProductRank::where('product_id', $product_id)->where('user_id', Auth::user()->id)->delete();
        $ProductRank = new ProductRank();
        $ProductRank->user_id = Auth::user()->id;
        $ProductRank->product_id = $product_id;
        $ProductRank->rank = $rank;
        $ProductRank->save();
        return redirect()->back()->with('success_message', 'Rank done');
    }
}
