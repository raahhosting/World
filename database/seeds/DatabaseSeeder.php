<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //  $this->call(CouponsTableSeeder::class);
      //$this->call(CategoryTableSeeder::class);
         $this->call(DownloadsTableSeeder::class);
    }
}
