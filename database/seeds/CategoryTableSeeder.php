<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


          \DB::table('category')->insert([
    ['name'=>'Business Software', 'slug'=>'business-software','created_at'=>'2017-03-24 11:17:37', 'updated_at'=>'2017-03-24 11:17:37'],
    ['name'=>'Security', 'slug'=>'security','created_at'=>'2017-03-24 11:17:37', 'updated_at'=>'2017-03-24 11:17:37'],
     ['name'=>'System Softwares', 'slug'=>'system-softwares','created_at'=>'2017-03-24 11:17:37', 'updated_at'=>'2017-03-24 11:17:37'],
    ['name'=>'Operating Systems', 'slug'=>'operating-systems','created_at'=>'2017-03-24 11:17:37', 'updated_at'=>'2017-03-24 11:17:37'],
    ['name'=>'Windows Applications', 'slug'=>'windows-applications','created_at'=>'2017-03-24 11:17:37', 'updated_at'=>'2017-03-24 11:17:37'],
      ['name'=>'Drivers', 'slug'=>'drivers','created_at'=>'2017-03-24 11:17:37', 'updated_at'=>'2017-03-24 11:17:37'],
      ['name'=>'Networking', 'slug'=>'Networking','created_at'=>'2017-03-24 11:17:37', 'updated_at'=>'2017-03-24 11:17:37'],


        ]);


    }
}
