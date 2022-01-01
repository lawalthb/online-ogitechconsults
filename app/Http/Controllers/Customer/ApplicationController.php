<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\advertise;
use Illuminate\Http\Request;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Image;
use Illuminate\Support\Facades\Mail;
use App\Mail\newlyRegister;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $advertise = advertise::get()->where('user_id', $user_id);
        return view('customers.applications', compact(['advertise']));
    }

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
       
        ini_set('max_execution_time', 180);
        $request->validate([  
            'name'=>'string|max:191|min:3', 
             'image' =>'required|image|mimes:jpg,jpeg,png,gif,svg|max:3072',
             'amount' =>'required'
        ]);

        $data = array();
        
        $data['name'] = $request->name;
        $data['user_id'] = Auth::user()->id;
       
        $data['amount'] = $request->amount;
        $data['add_info'] = '';
        $data['status'] = 1;
        $data['created_at'] = Carbon::now()->toDateTimeString();

        $banner_img =  $request->file('image');
 
       
        $up_location = 'uploads/';
        // get width and height
        $banner_size = $request->banner_size;
        $banner_size_arr = explode('-',$banner_size);
        $width =   $banner_size_arr[1];
        $hieght =   $banner_size_arr[2];
        $name_gen = hexdec(uniqid()).'.'.$banner_img->getClientOriginalExtension();
        Image::make($banner_img)->resize($width,$hieght)->save($up_location.$name_gen);
        $data['location'] =  $banner_size_arr[0];
        $data['banner_size'] = $width.'-'.$hieght;
        $data['image'] =$up_location.$name_gen;
        $advertise_id =DB::table('advertises')->insertGetId($data);
        
        session()->flash('success', 'Banner Added successfully. Click the payment icon to make payment');
       
        return \App::call('App\Http\Controllers\Customer\ApplicationController@index');
       
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\advertise  $advertise
     * @return \Illuminate\Http\Response
     */
    public function show(advertise $advertise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\advertise  $advertise
     * @return \Illuminate\Http\Response
     */
    public function edit(advertise $advertise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\advertise  $advertise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, advertise $advertise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\advertise  $advertise
     * @return \Illuminate\Http\Response
     */
    public function destroy(advertise $advertise)
    {
        //
    }


}
