<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
  protected $table   = 'extras';
  protected $guarded = [];

  public function extracurricular()
  {
    return $this->belongsTo('App\Extracurricular');
  }
}
