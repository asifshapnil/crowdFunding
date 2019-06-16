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
use App\Models\Project;
use App\Models\Investment;
use App\Models\InvestmentDetails;
use App\Models\InvestmentReward;
use App\Models\Reward;
use App\User;
use App\Models\Withdrawal;
use App\Models\Message;
use App\Models\OrderDetail;

use App\Models\UserCard;
use Auth;

class InvestController extends Controller
{
	public function __construct()
    {

    }

    public function index()
    {
        $projects = Project::whereIn('status', [1,3])->whereHas('investment', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->orderBy('created_at', 'desc')->get();
				// dd(Auth::user()->id);
				// $project_data = array();
				// $i = 0;
				// foreach ($projects as $project) {
				// 	$project_data[$i][0] = $project;
				// 	$project_data[$i][1] = Investment::where('project_id', $project->id)->count();
				// 	$i++;
				// }
				$data['messages'] = Message::where('to_id', Auth::user()->id)->get();
				$data['OrderDetails'] = OrderDetail::where('status', 0)->whereHas('product', function($q){
                            $q->where('user_id', Auth::user()->id);
                        })->get();

				$data['projects'] = $projects;
        return view('user.invest_list', $data);
    }
		public function user_withdrawal(){
			return view('user.user-withdrawal');
		}
		public function user_withdrawal2(Request $request ){
			$finish = false;
			if($request->finish){
					$finish = true;
			}
			$data['finish'] = $finish;
			return view('user.user-withdrawal2', $data);
		}
		public function user_withdrawal_action(Request $request){
			$withdrawal = new Withdrawal();
			$withdrawal->user_id = Auth::user()->id;

			$withdrawal->reason = $request->reason;
			$withdrawal->reason_details = $request->reason_details;
			$withdrawal->save();


			return redirect()->to(route('user-withdrawal2', ['finish' => true]));
		}
		public function user_withdrawal3(){
			return view('user.user-withdrawal3');
		}
		public function user_withdrawal4(){
			return view('user.user-withdrawal4');
		}

    public function invest(Request $request)
    {
        $finish = false;
        if($request->finish){
            $finish = true;
        }
        $data['finish'] = $finish;
        $data['p'] = Project::where('status', 1)->where('id', $request->id)->first();
				$data['user'] = User::where('id', Auth::user()->id)->first();
				$data['p_id'] = $request->id;
				// dd($data['user']);
    	return view('user.invest', $data);
			// return view('user.invest-backup', $data);

    }
    public function investAction(Request $request)
    {
			// return $request->input('number');

        $User = User::find(Auth::user()->id);
        // dd($User);
        $order_no = 'ORD-'.time().Auth::user()->id.rand(1000,9999);
        $amount = 0;
        $point = 0;
        // for($i=0;$i<count($request->reward_id);$i++) {
        //     if(!empty($request->quantity[$i])){
        //         $reward = Reward::find($request->reward_id[$i]);
        //         if($reward){
        //             $amount += $request->quantity[$i]*$reward->amount;
        //             if($reward->is_crofun_point) $point+=$request->quantity[$i]*$reward->crofun_amount;
        //         }
        //     }
        // }

        $reward = Reward::find($request->reward_id);
        $amount = $reward->amount;

        if($request->card_info == 1){
            if(!empty($request->card)){
                $UserCard = UserCard::find($request->card);
                $name = $UserCard->name;
                $number = $UserCard->number;
                $exp_year = $UserCard->exp_year;
                $exp_month = $UserCard->exp_month;
                $cvv = $UserCard->cvv;
            }

        }
        elseif($request->card_info == 2){
            $name = $request->name;
            $number = $request->number;
            $exp_year = $request->exp_year;
            $exp_month = $request->exp_month;
            $cvv = $request->cvv;
        }

        if($amount > 0 && !empty($request->number)){
            $data = [
                    'amount' => $amount,
                    'currency' => 'JPY',
                    'metadata' => [
                        'order_no' => $order_no
                    ],
                    'payment_details' => [
                        'family_name' => Auth::user()->first_name.' '.Auth::user()->last_name,
                        'given_name' => $name,
                        'month' => $exp_month,
                        'number' => $number,
                        'type' => 'credit_card',
                        'verification_value' => $cvv,
                        'year' => $exp_year
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
            //     return redirect()->back()->with('error_message', 'payment failed');
            // }





            // GMO

            $shopId = 'tshop00031453';
            $shopName = 'Road Frontier Co';
            $shopPassword = 'xup3mw85';

            // \GMO\API\Defaults::setShopID($shopId);
            // \GMO\API\Defaults::setShopName($shopName);
            // \GMO\API\Defaults::setPassword($shopPassword);
            define('GMO_SHOP_ID', $shopId); // ショップＩＤ
            define('GMO_SHOP_PASSWORD', $shopPassword); // ショップ名
            define('GMO_SHOP_NAME', $shopName); // ショップパスワード
            define('GMO_TRIAL_MODE', true);


            // A wrapper object that does everything for you.
            $payment = new \GMO\ImmediatePayment();
             // Unique ID for every payment; probably should be taken from an auto-increment field from the database.
            $payment->paymentId = $order_no;
            $payment->amount = $amount;
            // This card number can be used for tests.
            $payment->cardNumber = $number;
            // A date in the future.
            $payment->cardYear = $exp_year;
            $payment->cardMonth = $exp_month;
            $payment->cardCode = $cvv;

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


        $Investment = new Investment();
        $Investment->user_id = Auth::user()->id;
        $Investment->project_id = $request->id;
        $Investment->amount = $amount;
        $Investment->status = true;



        if($request->shipping_address_radio == 1){
            $Investment->shipping_address = $User->shipping_address;
            $Investment->shipping_street_address = $User->shipping_street_address;
            $Investment->shipping_city = $User->shipping_city;
            $Investment->shipping_state = $User->shipping_state;
            $Investment->shipping_postal_code = $User->shipping_postal_code;
            $Investment->shipping_country = $User->shipping_country;
        }elseif($request->shipping_address_radio == 2){
            $Investment->shipping_address = $request->address;
            $User->shipping_address = $request->address;
            $Investment->shipping_street_address = $request->shipping_street_address;
            $User->shipping_street_address = $request->shipping_street_address;
            $Investment->shipping_city = $request->shipping_city;
            $User->shipping_city = $request->shipping_city;
            $Investment->shipping_state = $request->shipping_state;
            $User->shipping_state = $request->shipping_state;
            $Investment->shipping_postal_code = $request->postal_code;
            $User->shipping_postal_code = $request->postal_code;
            $Investment->shipping_country = $request->shipping_country;
            $User->shipping_country = $request->shipping_country;

        }
        $User->point += $point;
        $User->save();
        $Investment->save();

        // for($i=0;$i<count($request->reward_id);$i++) {
        //     if(!empty($request->quantity[$i])){
        //         $reward = Reward::find($request->reward_id[$i]);
        //         if($reward){
        //             $InvestmentReward = new InvestmentReward();
        //             $InvestmentReward->investment_id = $Investment->id;
        //             $InvestmentReward->reward_id = $reward->id;
        //             $InvestmentReward->quantity = $request->quantity[$i];
        //             $InvestmentReward->total = $request->quantity[$i]*$reward->amount;
        //             $InvestmentReward->save();
        //         }
        //     }
        // }

        $InvestmentReward = new InvestmentReward();
        $InvestmentReward->investment_id = $Investment->id;
        $InvestmentReward->reward_id = $reward->id;
        $InvestmentReward->quantity = 1;
        $InvestmentReward->total = $reward->amount;
        $InvestmentReward->save();

        $InvestmentDetails = new InvestmentDetails();
        $InvestmentDetails->investment_id = $Investment->id;
        $InvestmentDetails->amount = $amount;
        $InvestmentDetails->payment_method = 1;
        if($request->card_info == 1){
            $UserCard = UserCard::find($request->card);
            $InvestmentDetails->name = $UserCard->name;
            $InvestmentDetails->number = $UserCard->number;
            $InvestmentDetails->exp_year = $UserCard->exp_year;
            $InvestmentDetails->exp_month = $UserCard->exp_month;
            $InvestmentDetails->cvv = $UserCard->cvv;
        }elseif($request->card_info == 2){
            $UserCard = new UserCard();
            $UserCard->user_id = Auth::user()->id;
            $InvestmentDetails->name = $request->name;
            $UserCard->name = $request->name;
            $InvestmentDetails->number = $request->number;
            $UserCard->number = $request->number;
            $InvestmentDetails->exp_year = $request->exp_year;
            $UserCard->exp_year = $request->exp_year;
            $InvestmentDetails->exp_month = $request->exp_month;
            $UserCard->exp_month = $request->exp_month;
            $InvestmentDetails->cvv = $request->cvv;
            $UserCard->cvv = $request->cvv;
            $UserCard->save();
        }
        $InvestmentDetails->save();

    	return redirect()->to(route('user-invest', ['id' => $request->id, 'finish' => true]));
			// return $request->input('name');
    }
}
