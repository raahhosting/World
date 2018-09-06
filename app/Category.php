<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

  protected $table= 'category';

  public function downloads(){
      return $this->belongsToMany('App\Download');
  }

}
