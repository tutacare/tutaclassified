<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $dates = ['sundul_at'];

  public function subCategory()
  {
      return $this->belongsTo('App\SubCategory', 'sub_category_id');
  }

  public function user()
  {
      return $this->belongsTo('App\User', 'user_id');
  }

}
