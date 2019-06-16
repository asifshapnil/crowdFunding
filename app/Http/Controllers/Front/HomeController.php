<?php

/**
 * @Author: Redefinelab Ltd
 * @Date:   2017-10-16 13:36:56
 * @Last Modified by:   Md Shafkat Hussain Tanvir
 * @Last Modified time: 2017-10-16 13:37:10
 */

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Investment;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\Product;
use App\Models\RecentlyViewedProduct;
use App\User;

use App\Mail\Common;

use Illuminate\Pagination\LengthAwarePaginator;

use Cart;
use Auth;
use Mail;

class HomeController extends Controller
{
	public function __construct()
    {

    }

    public function test()
    {

        return view('front.test');


        // $data = [

        //         'amount' => 1000,
        //         'currency' => 'JPY',
        //         'metadata' => [
        //             'foobar' => 'hoge'
        //         ],
        //         'payment_details' => [
        //             'family_name' => 'Yamada',
        //             'given_name' => 'Taro',
        //             'month' => 12,
        //             'number' => '4111111111111111',
        //             'type' => 'credit_card',
        //             'verification_value' => '123',
        //             'year' => 2018
        //         ]

        // ];


        // $ch = curl_init();

        // curl_setopt($ch, CURLOPT_URL,"https://sandbox.komoju.com/api/v1/payments");
        // curl_setopt($ch, CURLOPT_USERNAME, 'sk_a9c133483cba199c92e5e5b38f71d47e5b3c16e6');
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        // in real life you should use something like:
        // curl_setopt($ch, CURLOPT_POSTFIELDS,
        //          http_build_query(array('postvar1' => 'value1')));

        // receive server response ...
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // $server_output = curl_exec ($ch);

        // curl_close ($ch);

        // dd(json_decode($server_output));







        // $client = new \GuzzleHttp\Client();

        // $res = $client->post('https://sandbox.komoju.com/api/v1/payments', $data);
        // dd($res);
        //echo $res->getStatusCode(); // 200
        // dd($res->getBody());
    }

    public function index(Request $request)
    {
        $projects = $this->projectData($request);
        $data['projects'] = $projects;
				// dd('hi');
    	return view('front.home', $data);
    }

    public function projectList(Request $request)
    {
        $data['projects'] = $this->projectData($request);
        // return view('front.project_list', $data);
				return view('front.project_list', $data);

    }
		public function ratingProjectList(Request $request)
		{
				$data['projects'] = $this->projectData($request);
				// return view('front.project_list', $data);
				return view('front.project_list', $data);

		}


    public function search(Request $request)
    {
        $data['projects'] = $this->projectData($request);
    	return view('front.newsearch', $data);
    }

    private function projectData($request)
    {
        $data = Project::where('status', 1)->where('start', '<=', date('Y-m-d'));
        if(!empty($request->c) && $request->c != 'p'){
            $data = $data->where('category_id', $request->c);
        }
        if(!empty($request->s) && $request->s == 'd'){
            $data = $data->orderBy('start', 'desc');
        }
        if(!empty($request->s) && $request->s == 'c'){
            $data = $data->orderBy('end', 'asc');
        }
        if(!empty($request->title)){
            $data = $data->where('title', 'like', '%'.$request->title.'%');
        }
        if(!empty($request->min_point)){
            $data = $data->whereHas('reward', function ($query) use ($request){
                $query->where('crofun_amount', '>=', $request->min_point);
            });
        }

        $paginated_data = $data->paginate(9);
        $data = false;
        if($request->c == 'p' || $request->s == 'p'){
            $data = $paginated_data->sortByDesc(function($project)
            {
                return $project->favourite->count();
            });
        }
        if($request->s == 'i'){
            $data = $paginated_data->sortByDesc(function($project)
            {
                return $project->investment->sum('amount');
            });
        }

        if($data){
            return new LengthAwarePaginator($data, $paginated_data->total(), $paginated_data->perPage());
        }
        return $paginated_data;


    }

    public function projectDetails(Request $request)
    {
        $query = Project::where('status', 1)->where('id', $request->id);
        $data['isFavourite'] = [];
        if(Auth::check()){
		  $data['isFavourite'] = Investment::where('project_id', $request->id)->where('user_id', Auth::user()->id)->first();
        }

        if(Auth::check()){
            $query = $query->withCount(['favourite' => function($q){
                $q->where('user_id', Auth::user()->id);
            }]);
        }
				$data['supports'] = Investment::where('project_id', $request->id)->count();
        $data['project'] = $query->first();
				// dd($data['project']);
				// dd($data['project']);
        // dd($data['project']);
        $data['social_title'] = $data['project']->title;
        $data['social_image'] = asset('uploads/projects/'. $data['project']->featured_image);
        $data['social_description'] = $data['project'] ;
        return view('front.project_details', $data);
    }
		public function projectDetailsAfterLogin(Request $request){

			// return $request->id;
			return view('auth.login-project-details');
		}

		public function login_project_details_action(Request $request){
			if (!Auth::attempt($request->only(['email', 'password']) )) {
	      return redirect()->back()->with('error', 'Credentials do not match');
			}
			return redirect()->route('front-project-details', $request->id);
			// return 'hi';
		}
		public function login_product_details_action(Request $request){
			if (!Auth::attempt($request->only(['email', 'password']) )) {
				return redirect()->back()->with('error', 'Credentials do not match');
			}
			return redirect()->route('front-product-details', $request->id);
			// return 'hi';
		}



    public function productList(Request $request)
    {

        $pdata = $this->productData($request);
        $data['products'] = $pdata['data'];
        $data['title'] = $pdata['title'];
        // dd($data);
        // $data['recent_products'] = [];

        // if(Auth::check()){
        //     $data['recent_products'] = RecentlyViewedProduct::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        // }
        // dd($data['recent_products']);
        // $data['featured_products'] = Product::where('status', 1)->where('is_featured', 1)->where('id', '!=', $request->id)->limit(8)->get();
        return view('front.product_list', $data);
    }

    private function productData($request)
    {
        $title = 'All';
        $products = Product::where('status', 1);
        if(!empty($request->c) && $request->c != 'p'){
            $products = $products->whereHas('subCategory', function($q) use ($request) {
                            $q->where('category_id', $request->c);
                        });
            $title = ProductCategory::find($request->c)->name;
        }
        if(!empty($request->sc)){
            $products = $products->where('subcategory_id', $request->sc);
            $title = ProductSubCategory::find($request->sc)->name;
        }

        if(!empty($request->title)){
            $products = $products->where('title', 'like', '%'.$request->title.'%');
            $title = $request->title;
        }


        $paginated_data = $products->paginate(5);
        $data = false;


        // dd($products[0]->orderDetails);
        if($request->c == 'p'){
            $data = $data->sortByDesc(function($product)
            {
                // return $data->orderDetails->sum('qty');
                return $product->favourite->count();
            });
        }

        if($data){
            return new LengthAwarePaginator($data, $paginated_data->total(), $paginated_data->perPage());
        }
        return ['data' => $paginated_data, 'title' => $title];
    }

    public function productDetails(Request $request)
    {
        $query = Product::where('status', 1)->where('id', $request->id);
        if(Auth::check()){
            $query = $query->withCount(['favourite' => function($q){
                $q->where('user_id', Auth::user()->id);
            }]);

            // RecentlyViewedProduct::where('user_id', Auth::user()->id)->where('product_id', $request->id)->delete();

            // RecentlyViewedProduct::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->skip(8)->take(100)->get()->each(function($row){
            //     $row->delete();
            // });
            // dd($test);
            // $RecentlyViewedProduct = new RecentlyViewedProduct();
            // $RecentlyViewedProduct->user_id = Auth::user()->id;
            // $RecentlyViewedProduct->product_id = $request->id;
            // $RecentlyViewedProduct->save();

        }

        $data['product'] = $query->first();
        // $get_products_user_id = $data['product']->user_id;
        $company_name = $data['product']->company_name;
        $data['any_two'] = Product::where('company_name', $company_name)->where('id', '!=', $request->id)->inRandomOrder()->take(2)->get();


        return view('front.product_details', $data);
    }


    public function cartAdd(Request $request)
    {
        if(!empty($request->id) && !empty($request->title) && !empty($request->quantity) && !empty($request->price)){
            $additionals = [];
            if(!empty($request->color)) $additionals['color'] = $request->color;
            if(!empty($request->size)) $additionals['size'] = $request->size;
            Cart::add($request->id, $request->title, $request->quantity, $request->price, $additionals);
        }
        return redirect()->back()->with('cart-success', 'cart has been added');
    }
    public function cartUpdate(Request $request)
    {
				// dd($request);
        Cart::update($request->row_id, $request->quantity);

        return redirect()->back();
    }


    public function cartRemove(Request $request)
    {
        Cart::remove($request->id);
        return redirect()->back();
    }


    public function cart(Request $request)
    {
			$finish = false;
			if($request->finish){
					$finish = true;
			}
			$data['finish'] = $finish;
			$data['user'] =  User::where('id', Auth::user()->id)->first();
			// dd($data['user']);
        // return view('front.cart-backup');
        return view('front.cart', $data);
    }

    public function checkOut(Request $request)
    {
        return view('front.checkout-backup');
    }

    public function companyProfile()
    {
        $data['content'] = Content::find(5);
        return view('front.content', $data);
        // $data['iframeUrl'] = 'http://road-frontier.com/company';
        // return view('front.iframe', $data);
    }

    public function userProfile()
    {
        return view('front.user_profile');
    }

    public function userProjectDetails()
    {
        return view('front.user_project_details');
    }
    public function about()
    {
        $data['content'] = Content::find(1);
        return view('front.content', $data);
    }
    public function faq()
    {
        $data['content'] = Content::find(2);
        return view('front.faq', $data);
    }
    public function howToUse()
    {
        $data['content'] = Content::find(3);
        return view('front.content', $data);
    }
    public function media()
    {
        $data['content'] = Content::find(4);
        return view('front.content', $data);
        // $data['iframeUrl'] = 'http://road-frontier.com/media';
        // return view('front.iframe', $data);
    }
    public function profile(Request $request)
    {
        $data['profile'] = User::find($request->id);
        return view('front.profile', $data);
    }
    public function terms()
    {
        $data['content'] = Content::find(6);
        return view('front.content', $data);
    }
    public function privacy()
    {
        $data['content'] = Content::find(7);
        return view('front.content', $data);
    }
    public function transactionLaw()
    {
        $data['content'] = Content::find(8);
        return view('front.content', $data);
    }

    public function contact(){
        return view('front.contact');
    }

    public function contactAction(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'details' => 'required'
        ]);

        $emailData = [
            'name' => $request->name,
            'subject' => 'Contact',
            'from_email' => 'crofun-contact@email.com',
            'user_email' => $request->email,

            'from_name' => 'CROFUN',
            'template' => 'user.email.contact',
            'root'     => $request->root(),
            'email' => 'support@crofun.com',
            'details' => $request->details
        ];

        Mail::to('support@crofun.com')
            ->send(new Common($emailData));

        return redirect()->back()->with('success_message', 'お問い合わせありがとうございました。');
    }
}
