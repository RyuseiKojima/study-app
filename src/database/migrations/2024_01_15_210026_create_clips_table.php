<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clips', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('記事タイトル');
            $table->string('url')->comment('URL');
            $table->string('site')->comment('サイト名');
            $table->string('category')->comment('カテゴリ');
            $table->text('memo')->nullable()->comment('メモ');
            $table->timestamps();
        });
    }
    //test

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clips');
    }
};
