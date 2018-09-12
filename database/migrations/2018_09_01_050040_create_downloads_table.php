<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDownloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('downloads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
			      $table->string('image')->default('');
			      $table->string('slug')->unique();
			      $table->text('description', 65535);
			      $table->string('file')->nullable()->default('');
			      $table->string('tags_relationship', 100)->nullable();
			      $table->integer('active');
            $table->decimal('price', 8, 2);
			      $table->integer('likes')->default(0);
			      $table->integer('downloads')->default(0);

			      $table->timestamp('time_download')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('downloads');
    }
}
