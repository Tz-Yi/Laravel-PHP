<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'users';
    protected $fillable = ['image'];
    protected $hidden = ['name', 'password', 'remember_token'];
}
