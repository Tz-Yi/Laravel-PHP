<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PHPAnalytics extends Model
{
  protected $table = 'analytics';
  protected $fillable = ['pageName', 'counter'];
  protected $hidden = ['id'];
}
