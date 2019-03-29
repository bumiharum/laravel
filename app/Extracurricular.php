<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extracurricular extends Model
{
  protected $table   = 'extracurriculars';
  protected $guarded = [];

  public function extras()
  {
    return $this->hasMany('App\Extra');
  }

}
