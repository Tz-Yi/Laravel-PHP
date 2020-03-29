<?php

namespace App;

// Default;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model;

class Member extends Model {
    protected $fillable = [
      'email', 'password', 'api_token',
    ];
}
