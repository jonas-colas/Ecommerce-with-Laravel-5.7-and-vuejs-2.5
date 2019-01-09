<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Featureimage extends Model
{

  protected $table = 'featureimages';

  protected $fillable = ['product_id', 'featureimages'];

  public function products()
  {

      return $this->belongsToMany('App\Product');

  }

}
