<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
  protected $table   = 'administrator';
  protected $guarded = [];

  public function role()
  {
    return $this->belongsTo('App\Role');
  }
}
