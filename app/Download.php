<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Download extends Model
{

protected $fillable = [

  'title','image','description','file','price'
];


      use SearchableTrait;
      /**
 * Searchable rules.
 *
 * @var array
 */
protected $searchable = [
    /**
     * Columns and their priority in search results.
     * Columns with higher values are more important.
     * Columns with equal values have equal importance.
     *
     * @var array
     */
    'columns' => [
        'downloads.title' => 10,
        'downloads.description' => 8,
        'downloads.slug' => 2,

    ],
    // 'joins' => [
    //     'posts' => ['users.id','posts.user_id'],
    // ],
];
    // public function presentPrice(){
    //
    //   return money_format('$%i',$this->price/100);
    //
    // }


    public static $validators = array(
            'title'   => 'required|min:3',
            'description'  => 'required|min:6');

    	public function category(){
    	    return $this->belongsTo(Category::class);
    	}
      public function categories(){
        return $this->belongsToMany(Category::class);
      }

      public function user(){
          return $this->belongsTo(User::class);
      }


    public function link(){
		$download_url_slug = (config('downloads_url_slug') !== null) ? config('downloads_url_slug') : 'download';
		return url($download_url_slug) . $this->slug;
	}
}
