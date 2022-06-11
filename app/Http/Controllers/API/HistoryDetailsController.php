<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\HistoryDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //
    //     $getall = HistoryDetails::orderBy('id', 'desc')->paginate(3);
    //     return $getall;
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function fetchHistory(Request $request)
    {
        //
        //$user = auth()->user();
        $my2id = $request->get('id');
        $pageNumber = $request->get('pageNumber');

        //$my2id = $user
        $job = HistoryDetails::where('uid', $my2id)->paginate(5,['*'],'page',$pageNumber);
        return $job;
    }

    public function fetchProfile(Request $request)
    {
       
        $my2id = $request->get('id');
       //$my2id = $user
        $user = User::where('id', $my2id)->first();
        return $user;
    }
    public function updateProfile(Request $request)
    {
        //
        $tid = $request->utid;

        $userprofile = User::where('id', $tid)->first();
        /* check if query is empty */
        
            
            
                 /* If everything is find, update user table */
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
}
