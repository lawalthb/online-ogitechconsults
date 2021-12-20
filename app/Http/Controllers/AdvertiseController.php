<?php

namespace App\Http\Controllers;

use App\Models\advertise;
use Illuminate\Http\Request;
use App\Http\Requests\AdvertiseRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Image;
use Illuminate\Support\Facades\Mail;
use App\Mail\newlyRegister;

class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('advertise/applications');
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
            'name'=>'string|max:191|min:3', 'company'=>'required|string|max:191|min:3',
             'email' =>'required|string|email|unique:users', 'image' =>'required|image|mimes:jpg,jpeg,png,gif,svg|max:3072',
             'phone' =>'required', 'location' =>'required', 'amount' =>'required'
        ]);
        $newUser =  User::create([
            'name' => $request->name,
            'email' =>$request->email,
            'password' => Hash::make($request->phone),
        ]);
       
      
        $data = array();
        
        $data['name'] = $request->name;
        $data['user_id'] = $newUser->id;
        $data['company'] = $request->company;
        $data['website'] = $request->website; 
        $data['email'] = $request->email; 
        $data['phone'] = $request->phone;
        $data['banner_size'] = $request->banner_size;
        $data['location'] = $request->location;
        $data['amount'] = $request->amount;
        $data['add_info'] = $request->add_info;
        $data['status'] = 1;
        $data['created_at'] = Carbon::now()->toDateTimeString();

        $banner_img =  $request->file('image');
 
       
        $up_location = 'uploads/';
        // get width and height
        $banner_size = $request->banner_size;
        $banner_size_arr = explode('-',$banner_size);
        $width =   $banner_size_arr[0];
        $hieght =   $banner_size_arr[1];
        $name_gen = hexdec(uniqid()).'.'.$banner_img->getClientOriginalExtension();
        Image::make($banner_img)->resize($width,$hieght)->save($up_location.$name_gen);
        $data['image'] =$name_gen;
        $advertise_id =DB::table('advertises')->insertGetId($data);
        // send mail
        $email = $request->email;
        $image_link = $up_location.$name_gen;
        $mailData = [
        'title' => 'Adv. Email',
        'url' => 'https://www.runaroundnews.com',
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'image_link' => $image_link,
        ];

        Mail::to($email)->send(new newlyRegister($mailData));
        $image_link = $up_location.$name_gen;
        $company = $request->company;
        $amount = $request->amount;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $advertise_id;
        return view('guest-payment', compact('name', 'phone', 'email', 'image_link','company','amount','advertise_id'))
        ->with('success');
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
