<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryDownload extends Model
{
    protected $table = 'category_download';

    protected $fillable = ['download_id','category_id'];


    public function downloads(){


      return $this->belongsToMany('App\Download');
    }
}
