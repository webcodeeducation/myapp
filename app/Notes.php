<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notes extends Model
{
    //use HasFactory;

    protected $fillable = ['user_id','title', 'title', 'content'];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
