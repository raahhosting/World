<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

  protected $fillable = ['user_id','billing_email','billing_name','billing_address',
  'billing_city','billing_country','billing_zip','billing_phone','billing_name_on_card',
  'billing_discount','billing_discont_code','billing_subtotal','billing_tax','billing_total',
  'error',
];

    public function user(){

return $this->belongsTo('App\User');

    }


    public function downloads(){

return $this->belongsToMany('App\Download','order_download')->withPivot('quantity');

// return $this->belongsToMany('App\Download','order_download','download_id','order_id')->withPivot('quantity');

    }
}
