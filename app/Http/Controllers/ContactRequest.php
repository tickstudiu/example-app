<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'name', 'email', 'mobile_number', 'message'
     ];
}