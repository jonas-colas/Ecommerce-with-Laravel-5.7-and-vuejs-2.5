<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

  protected $fillable = ['title', 'short_description' ,'description', 'price', 'technical_details', 'featured', 'screen_size','item_dimensions', 'screen_weight', 'model_year', 'resolution', 'total_hdmi_ports', 'rate'];

  public function categories()
  {
      return $this->belongsToMany('App\Category');
  }

  public function featureimage()
  {
    return $this->hasOne('App\Featureimage', 'product_id');
  }

  public function image()
  {
    return $this->hasMany('App\Images', 'product_id');
  }

  public function tags()
  {
    return $this->belongsToMany('App\Tag');
  }

  public function orders()
  {
      return $this->belongsToMany('App\Order');
  }

  public function wishlists()
  {
      return $this->hasMany('App\Wish');
  }
}
