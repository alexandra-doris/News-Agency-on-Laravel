<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->string('slug')->unique();
            $table->string('subtitle',200)->nullable();
            $table->mediumtext('body')->nullable();
            $table->string('image');
            $table->integer('posted_by');
            $table->boolean('status'); //validated or not
            $table->integer('category_id')->nullable();
            $table->timestamps();

            //$table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
