<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function getStatusAttribute($value)
    {
        if($value== 1){
            return "No Payment";

        }elseif($value== 2){
            return "Paid";
        }else{
            return "Pending";
        }

       
    }


}
