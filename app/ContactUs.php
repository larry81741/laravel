<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
      protected $table = 'contact_us';
      protected $fillable = ['name', 'email', 'phone', 'title', 'content','created_at','update_at']; //可存取更改的欄位(白名單) 
}
