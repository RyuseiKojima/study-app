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
        Schema::table('category_clip', function (Blueprint $table) {
            $table->dropForeign(['category_id']); //いったん外部キーを削除する。
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_clip', function (Blueprint $table) {
            $table->dropForeign(['category_id']); //いったん外部キーを削除する。
            $table->foreign('category_id')
                ->references('id')->on('categories');
        });
    }
};
