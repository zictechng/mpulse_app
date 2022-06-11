<?php

namespace App\Http\Controllers\API;
use App\Models\Coupon;
use App\Http\Controllers\Controller;
use App\Models\CouponCodeGenerate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CouponController extends Controller
{

    // public function __construct(){
    //     $this->middleware(function ($request, $next) {
    //       $this->user_info=Auth::user(); // returns user
    //       return $next($request);
    //     });
    //   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // validate the inputs from the server side here.
        $this->validate($request,[
            'coupon_code' => 'required|string|max:6'
        ]);
        $user = User::where('id', $request['user_id'])->first();

        $code_sent = $request->coupon_code;
          /* check if the coupon exist */
         $coupon = CouponCodeGenerate::where('generate_code', $code_sent)->first();
            if(empty($coupon))
            {
                //if not show error message;
                return response()->json(['message' =>  "Wrong coupon code entered!"], 404);
            }
            elseif($request['user_id'] == '')
            {
                return response()->json(['message' =>  "User not authenticated"], 404);
            }
            // get coupon details
            $amt_code = $coupon->code_amount;
            $pstatus = $coupon->partner_status;
            $pay_status = $coupon->partn_pay_code;
            $pbatch_code = $coupon->partn_batch_code;
            // check payment status of the coupon code by the vendor
            if($pay_status != 'Paid')
            {
                return response()->json(['message' =>  "Coupon code not valid"], 404);
            }
            // check if the vendor account is active or not
            elseif($pstatus != 'Active')
            {
                return response()->json(['message' =>  "Coupon code not active"], 404);
            }
            // fetch coupon details/ check if the coupon have been used
            $count = Coupon::where('coupon_code', $code_sent)->first();
            // if Yes
            if(!empty($count))
            {
                return response()->json(['message' =>  "Coupon code already been used"], 404);
                // show error message here
            }

            else{

         // create/register new user details
        //  $product = new Coupon();

        //  $product->coupon_code = $request['coupon_code'];
        //  $product->user_id = $request['user_id'];
        //  $product->code_amount = $coupon_amt;
        //  $product->code_status = $pstatus;
        //  $product->coupon_batch_code = $pbatch_code;
        //  $product->save();
        //  return $product;
        $userbal = $user->gamount;
        $newbal = ($userbal + $amt_code);

        $product = Coupon::create([
            'coupon_code'=> $request['coupon_code'],
            'user_id'=> $request['user_id'],
            'code_amount'=> $amt_code,
            'code_status'=> 'Used',
            'coupon_batch_code'=> $pbatch_code,
            ]);
            // update user total balance...
            $user->gamount = $newbal;
            $user->update(['gamount' => $newbal ]);
            return $product;
          }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $userid = $request->get('id');
        return Coupon::latest()->where('user_id', $userid)->paginate(5);
    }



    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /* cash request function goes here */
    public function cashout(Request $request)
    {


    }




}
