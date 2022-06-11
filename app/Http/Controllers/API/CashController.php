<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CashOut;
use App\Models\Coupon;
use App\Models\CouponTransfer;
use App\Models\history;
use App\Models\HistoryDetails;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CashController extends Controller
{

    public function index()
    {
        //
        //$wallet = User::where('id', $id)->sum('gamount');


    }

    public function create()
    {
        //
    }

    public function storecash(Request $request)
    {
        //
        // validate the inputs from the server side here.
        $this->validate($request,[
            'code_amt' => 'required|numeric'
        ]);
         /* fatch user details here */
         $user = User::where('id', $request['user_id'])->first();
         $oldbal = $user->gamount;
         $amt_send = $request['code_amt'];

        if($request['user_id'] == '')
            {
                return response()->json(['message' =>  "User not authenticated"], 404);
            }
        /* check if user has money or if the balance is big enoug to widthraw */
        elseif($oldbal < $request['code_amt'])
            {
            return response()->json(['message' =>  "Balance too low for withdrawing! You need to earn more coupon code"], 404);
            // show error message here
            }

        else{
        /* Generate unique transaction ID for each cash request record */
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            // Output: 54esmdr0qf
           $tid = substr(str_shuffle($permitted_chars), 0, 16);
        // create/register new user details
            $userbal = $user->gamount;
            $newbal = ($oldbal - $amt_send);
            $product = CashOut::create([
            'user_id'=> $request['user_id'],
            'name'=> $request['user_name'],
            'email'=> $request['user_email'],
            'phone'=> $request['user_phone'],
            'amount'=> $amt_send,
            'tran_id'=> $tid,
            'note_send'=>$request['shot_note'],
            ]);

            /* create history record for this user for loading coupon */
            $shistory = new history();
            $shistory->user_id = $request['user_id'];
            $shistory->user_email = $request['user_email'];
            $shistory->send_amt = $amt_send;
            $shistory->status = 'Credit';
            $shistory->action_nature = 'Coupon Loanded';
            $shistory->save();
            // update user total balance...
            $userbal = $newbal;
            $user->update(['gamount' => $userbal]);
            return $product;
        }
    }

    public function showtotal(Request $request)
    {
        $user_id = $request->get('id');
        $wallet = User::where('id', $user_id)->first()['gamount'];
        return $wallet;
    }

    public function transaction(Request $request)
    {
        //$wallet = User::with('users')->sum('gamount');
        $userid = $request->get('id');
        return Coupon::latest()->where('user_id', $userid)->paginate(5);
    }

    public function transferFunds(Request $request)
    {

        /* validate the inputs from the server side here. */
        // $this->validate($request,[
        //     'code_amt' => 'required|numeric',
        //     'rec_email' => 'required|email'
        // ]);

        $rules = [
            'code_amt' => 'required|numeric',
            'rec_email' => 'required|email',

        ];

        $customMessages = [
            'code_amt.required' => 'Amount is required.',
            'rec_email.required' => 'Email is required.'
        ];

        $this->validate($request, $rules, $customMessages);

         /* fatch user details here */
         $user = User::where('id', $request['user_id'])->first();
         $oldbal = $user->gamount;
         $amt_send = $request['code_amt'];
        /* check if user email exist in the system */
        $rec_user = User::where('email', $request['rec_email'])->first();

        $receiver_oldAmt = $rec_user['gamount'];
        $receiver_id = $rec_user['id'];
        $receiver_name = $rec_user['name'];

        if(empty($rec_user))
            {
                //if not show error message;
                return response()->json(['message' =>  "User email not matched!"], 404);
            }

        else if($request['user_id'] == '')
            {
                return response()->json(['message' =>  "User not authenticated"], 404);
            }
        /* check if user has money or if the balance is big enoug to widthraw */
        elseif($oldbal < $request['code_amt'])
            {
            return response()->json(['message' =>  "Insufficient coupon cash!"], 404);
            // show error message here
            }

        else{
        /* Generate unique transaction ID for each cash request record */
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            // Output: 54esmdr0qf
           $tid = substr(str_shuffle($permitted_chars), 0, 16);
        // create/register new user details
            $userbal = $user->gamount;
            $newbal = ($oldbal - $amt_send);

            /* receiver total balance update */
            $receiver_newbal = ($receiver_oldAmt + $amt_send);

            /* save the details to transfer table */
            $transfer = new CouponTransfer();
            $transfer->user_id = $request['user_id'];
            $transfer->rec_id = $receiver_id;
            $transfer->sender_email = $request['user_email'];
            $transfer->sender_name = $request['user_name'];
            $transfer->rec_email = $request['rec_email'];
            $transfer->rec_name = $receiver_name;
            $transfer->status = 'Active';
            $transfer->amt_send = $amt_send;
            $transfer->trancode = $tid;
            $transfer->act_status = 'Credit';
            $transfer->save();
        //  return $product;
            // $product = CashOut::create([
            // 'user_id'=> $request['user_id'],
            // 'name'=> $request['user_name'],
            // 'email'=> $request['user_email'],
            // 'phone'=> $request['user_phone'],
            // 'amount'=> $amt_send,
            // 'tran_id'=> $tid,
            // 'note_send'=>$request['shot_note'],
            // ]);
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            // Output: 54esmdr0qf
           $tcode= substr(str_shuffle($permitted_chars), 0, 16);

            // update sender user total balance...
            $userbal = $newbal;
            $user->update(['gamount' => $userbal]);
            /* update receiver total balance */
            $rec_newbal = $receiver_newbal;
            $rec_user->update(['gamount' => $rec_newbal]);
            $transfer->update(['acct_status2' => 'Debit']);
            /* create history record for sender user */
            $senderhistory = new HistoryDetails();
            $senderhistory->uid = $request['user_id'];
            $senderhistory->user_email = $request['user_email'];
            $senderhistory->send_amt = $amt_send;
            $senderhistory->status = 'Debit';
            $senderhistory->action_nature = 'Transfer';
            $senderhistory->tidcode = $tcode;
            $senderhistory->save();

            /* create history record for receiver user */
            $receiverhistory = new HistoryDetails();
            $receiverhistory->uid = $receiver_id;
            $receiverhistory->user_email = $request['rec_email'];
            $receiverhistory->send_amt = $amt_send;
            $receiverhistory->status = 'Credit';
            $receiverhistory->action_nature = 'Transfer';
            $receiverhistory->tidcode = $tcode;
            $receiverhistory->save();
            return $transfer;
        }
    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
