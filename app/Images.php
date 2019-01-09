<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
  protected $table = 'images';

  protected $fillable = ['product_id', 'images'];

  public function products()
  {

      return $this->belongsToMany('App\Product');

  }
}
