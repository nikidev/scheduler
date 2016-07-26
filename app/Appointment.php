<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['user_id','doctor_id','hour','status'];

    public function user() 
	{
		return $this->belongsTo('App\User');
	}
}
