<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infrastructure extends Model
{
  protected $table   = 'infrastructures';
  protected $guarded = [];

  public function pictures()
  {
    return $this->hasMany('App\Picture');
  }
}
