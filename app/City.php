<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  public function province()
  {
      return $this->belongsTo('App\Province', 'province_id');
  }
}
