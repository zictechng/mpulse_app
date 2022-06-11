<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class ProfileUpdateController extends Controller
{
    //

    public function updateProfile(Request $request)
    {
        //
        $tid = $request['id'];
        $userprofile = User::where('id', $tid)->first();
        /* check if query is empty */
        if(empty($userprofile))
        {
        return response()->json(['message' =>  "Sorry, Something went wrong! Try again"], 404);
        }
        elseif ($tid == '') {
            return response()->json(['message' =>  "User not authenticated"], 404);
        }
        else {
            /* If everything is find, update user details table */
            $userprofile->update([
                'name' => $request['name'],
                'phone' => $request['phone'],
                'sex' => $request['sex'],
                'state' => $request['state'],
                'location' => $request['location'],
                'address' => $request['address'],
                'dob' => $request['dob'],
                'occupation' => $request['occupation'],
                'married_status' => $request['married_status'],
                'acctno' => $request['acctno'],
                'acct_name' => $request['acct_name'],
                'bankname' => $request['bank_name'],
                ]);
            return $userprofile;
        }
      }

      public function updatePhoto(Request $request)
      {

        //return $request->image;
        // $this->validate($request,[
        //     'image' => 'required|image|mimes:png,jpg,jpeg.gif',
        // ]);

        $image = $request->image;
        $myid = $request->user_id;

        $getuser = User::where('id', $myid)->first();
        if(empty($getuser))
        {
        return response()->json(['message' =>  "Sorry, Something went wrong! Try again"], 404);
        }

        //   $imagename = Carbon::now()->timestamp.'.'.$request->image->extension();
        //   $request->image->storeAs(public_path('/master/images/profile'),$imagename);

        //$image->move(public_path('/master/images/profile'),$imageName);
             $getuser->update([
            'photo' => $image,
            ]);
            return response()->json($getuser);
      }
      /* user photo image uploading here */
      public function updateImage(Request $request)
      {
        $myid = $request->user_id;
        $user = User::where('id', $myid)->first();
        $currentPhoto = $user->photo;
        $userPhoto = public_path('/master/images/profile/').$currentPhoto;
        if($request->hasFile('image'))
        {
            $imagename = Carbon::now()->timestamp.'.'.$request->image->extension();//getClientOriginalName();
            $request->image->move(public_path('/master/images/profile'),$imagename);;
            $user->update([
                'photo' => $imagename,
                ]);
            /*check if user has any photo before and delete */
            if(file_exists($userPhoto))
            {
                @unlink($userPhoto);
            }
            //$request->user()->update(['photo' => $imagename]);
            return response()->json(['message' =>  "Updated successfully"], 202);
        }

      }

      public function saveSetting(Request $request)
      {
        $tid = $request['user_id'];
        $myprofile = Setting::where('user_id', $tid)->first();
        /* check if query is empty */
        $topup_alert = $request['topup_email'];
        $debit_alert = $request['debit_email'];
        $acct_alert = $request['acct_email'];
        $fa2_alert = $request['fa2_email'];
        $credit_alert = $request['credit_email'];
        $update_alert = $request['update_email'];
        $promo_alert = $request['promo_email'];
        $otp_alert = $request['otp_email'];
        if(empty($myprofile))
        {
        /* create new user setting details */
         $setting = new Setting();
         $setting->user_id = $request['user_id'];
         $setting->topup_email = $request['topup_email'];
         $setting->debit_email = $request['debit_email'];
         $setting->acct_email = $request['acct_email'];
         $setting->fa2_email = $request['fa2_email'];
         $setting->credit_email = $request['credit_email'];
         $setting->update_email = $request['update_email'];
         $setting->promo_email = $request['promo_email'];
         $setting->otp_email = $request['otp_email'];
         $setting->save();
         if($setting->save())
         {
            return response()->json(['message' =>  "Setting save successfully"], 200);
         }
         else
         {
            return response()->json(['message' =>  "Something went wrong! Try again"], 404);
         }
         //return $setting;
        }
        elseif (!empty($myprofile))
        {
            /* update user setting details */
            //dd($request->all());
            if($request->topup_email ==true || $request->topup_email== "1" )
            {
                $topup_alert = "1";
            }
            else
            {
                $topup_alert = "";
            }
            if($request->debit_email== true || $request->debit_email== "1" )
            {
                $debit_alert = "1";
            }
            else
            {
                $debit_alert = "";
            }
            if($request->acct_email== true || $request->acct_email== "1" )
            {
                $acct_alert = "1";
            }
            else
            {
                $acct_alert = "";
            }
            if($request->fa2_email== true || $request->fa2_email== "1" )
            {
                $fa2_alert = "1";
            }
            else
            {
                $fa2_alert = "";
            }
            if($request->credit_email== true || $request->credit_email== "1" )
            {
                $credit_alert = "1";
            }
            else
            {
                $credit_alert = "";
            }
            if($request->update_email=="0" || $request->update_email== false )
            {
                $update_alert = "";
            }
            else
            {
                $update_alert = "1";
            }
            if($request->promo_email==true || $request->promo_email=='1')
            {
                $promo_alert ='1';
            }
            else{
                $promo_alert = '';
            }
            if($request->otp_email==true || $request->otp_email=='1')
            {
                $otp_alert ='1';
            }
            else{
                $otp_alert = '';
            }
            $myprofile->update([

                'topup_email' => $topup_alert,
                'debit_email' => $debit_alert,
                'acct_email' => $acct_alert,
                'fa2_email' => $fa2_alert,
                'credit_email' => $credit_alert,
                'update_email' => $update_alert,
                'promo_email' => $promo_alert,
                'otp_email' => $otp_alert,
                //dd($request->all()),
               ]);
            //return $myprofile;
            return response()->json(['message' =>  "Setting Updated successfully"], 200);
        }
            else{
                return response()->json(['message' =>  "Something went wrong! Try again"], 404);
                }
      }

      public function fetchSetting(Request $request)
      {
        $user_id = $request->id;
         $data = Setting::where('user_id', $user_id)->first();
         //$data = DB::table("users")->where('id', $user_id)->sum('gamount');
         return $data;
      }
}
