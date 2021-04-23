<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Client_record extends Model
{
    use HasFactory;

        protected $fillable = [
        'first_name',
        'last_name',
        'client_id',
        'email',
        'legal_counsel',
        'dob',
        'case_details',
        'profile_pic'
    ];






   // public function runNotification($value='')
   // {
     
   //      return $message;
   // }
}
