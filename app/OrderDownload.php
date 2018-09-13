<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDownload extends Model
{
    protected $table = 'order_download';

    protected $fillable = ['order_id','download_id','quantity'];
}
