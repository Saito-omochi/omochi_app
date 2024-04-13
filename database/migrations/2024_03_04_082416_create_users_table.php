<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Timestamps;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subs', function (Blueprint $table){
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('name',30);
            $table->string('icon')->default('public/storage/icon/default.png');;
            $table->integer('seacret');
            $table->string('profiletext',300)->default('sample text');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('categories', function (Blueprint $table){
            $table->id();
            $table->string('name');
        });
        
        Schema::create('posts', function (Blueprint $table){
            $table->id();
            $table->foreignId('sub_id')->constrained();
            $table->string('content',300);
            $table->foreignId('category_id')->constrained('categories');
            $table->timestamps();
            $table->softDeletes();
        });          
        
        Schema::create('category_sub', function (Blueprint $table){
            $table->id();
            $table->foreignId('sub_id')->constrained('subs');
            $table->foreignId('category_id')->constrained('categories');
        });
        
        Schema::create('follows', function (Blueprint $table){
            $table->id();
            $table->foreignId('following_id')->constrained('subs');
            $table->foreignId('followed_id')->constrained('subs');
            $table->timestamps();
        });
        
        Schema::create('likes', function (Blueprint $table){
            $table->id();
            $table->foreignId('sub_id')->constrained('subs');
            $table->foreignId('post_id')->constrained('posts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    /*
    public function down()
    {
        Schema::dropIfExists('mains');
    }
    */
};
