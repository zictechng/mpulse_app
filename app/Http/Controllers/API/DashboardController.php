<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\CouponTransfer;
use App\Models\history;

class DashboardController extends Controller
{
    //
    public function index()
    {
        //
        //$wallet = User::with('users')->sum('gamount');
       // $user_id = $request->get('id');
       return User::latest()->paginate(5);
    }

    public function profile(Request $request)
    {
       $user_id = $request->id;
      // return Coupon::where('user_id', $user_id)->first();
       $data = DB::table("users")->where('id', $user_id)->sum('gamount');
       return $data;
    }
    public function alltimebal(Request $request)
    {
        // 1
        $user_id = $request->get('id');
        $alltime = User::where('id', $user_id)->sum('gamount');
        return $alltime;
    }
    public function alltimeTransfer(Request $request)
    {
        // 2
        $userId = $request->get('uid');
        $alltransfer = CouponTransfer::where('user_id', $userId)->where('status','Active')->where('acct_status2','Debit')->sum('amt_send');
        return $alltransfer;
    }

    public function receiveTransfer(Request $request)
    {
        // 2
        $myid = $request->get('idu');
        $total_rectransfer = CouponTransfer::where('rec_id', $myid)->where('status','Active')->where('act_status','Credit')->sum('amt_send');
        return $total_rectransfer;
    }
    public function allRevenue(Request $request)
    {
        // 2
        $myid = $request->get('id');
        $totalrevenue = Coupon::where('user_id', $myid)->sum('code_amount');
        return $totalrevenue;
    }


}
