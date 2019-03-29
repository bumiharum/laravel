<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
  protected $table = 'pictures';
  protected $guarded = [];

  public function infrastructure()
  {
    return $this->belongsTo('App\Infrastructure');
  }
}
