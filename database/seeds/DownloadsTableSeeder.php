<?php

use Illuminate\Database\Seeder;
use App\Download;

class DownloadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('downloads')->delete();

      \DB::table('downloads')->insert(array (
          0 =>
          array (
              'id' => 23,
              'title' => 'Avast AntiVirus',
              'image' => './img/avast-logo.png',
              'slug' => 'designer-desk-essentials',
              'description' => '<p>We\'re happy to offer you this awesome PSD mock-up that you can use to create custom hero images for your portfolio page, profile cover and more. All objects, shadows and background are separated so you can build your own composition with ease.</p>
<p>The package also includes 4 ready-made PSD scenes and 2 seamless wooden textures.</p>',
              'file' => 'https://s3-us-west-1.amazonaws.com/getpixelapp/downloads/download-039.zip',
              'tags_relationship' => '',
              'active' => 1,
              'price'=>24,
              'likes' => 0,
              'downloads' => 0,
              'category_id' => 6,
              'time_download' => '2017-03-24 12:00:00',
              'created_at' => '2015-09-13 16:02:00',
              'updated_at' => '2017-03-15 02:25:59',
          ),
          40 =>
  array (
      'id' => 63,
      'title' => 'Adobe Reader',
      'image' => './img/adobe.png',
      'slug' => 'pex-free-psd-template',
      'description' => '<p>This awesome website design is called Plex. You can download this design for free and use it in any web application or web project.</p>',
      'file' => 'https://s3-us-west-1.amazonaws.com/getpixelapp/downloads/download-041.zip',
      'tags_relationship' => NULL,
      'active' => 1,
      'price'=>56,
      'likes' => 0,
      'downloads' => 0,
      'category_id' => 2,
      'time_download' => '2017-03-24 11:17:37',
      'created_at' => '2017-03-24 18:17:37',
      'updated_at' => '2017-03-24 18:17:37',
  ),
          ));
    }
}
