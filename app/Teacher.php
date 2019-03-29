<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
  protected $guarded = [];

  public function study()
  {
    return $this->belongsTo('App\Study');
  }
}
