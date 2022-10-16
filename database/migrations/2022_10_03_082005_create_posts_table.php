<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->integer('categorie_id');
            $table->string('name');
            $table->string('slug');
            $table->mediumText('description');
            $table->string('yt_iframe');
            // seos part
            $table->string('meta_title');
            $table->mediumText('meta_description');
            $table->mediumText('meta_keyword');
            // auth part
            $table->tinyInteger('status');
            $table->integer('created_by');

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
        Schema::dropIfExists('posts');
    }
};
