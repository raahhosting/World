<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    // public function presentPrice(){
    //
    //   return money_format('$%i',$this->price/100);
    //
    // }


    public static $validators = array(
            'title'   => 'required|min:3',
            'description'  => 'required|min:6');

    	public function categories(){
    	    return $this->belongsTo(Category::class);
    	}


    public function link(){
		$download_url_slug = (config('downloads_url_slug') !== null) ? config('downloads_url_slug') : 'download';
		return url($download_url_slug) . $this->slug;
	}
}
