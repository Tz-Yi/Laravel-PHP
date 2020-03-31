<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginCounter extends Model
{
  protected $table = 'users';
  protected $fillable = ['loginCount'];
  protected $hidden = ['name', 'password', 'remember_token', 'image'];
}
