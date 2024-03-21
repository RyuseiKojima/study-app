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
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['classification_id']); //いったん外部キーを削除する。
            $table->foreign('classification_id')
                ->references('id')->on('classifications')
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
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['classification_id']); //いったん外部キーを削除する。
            $table->foreign('classification_id')
                ->references('id')->on('classifications')->nullable();
        });
    }
};
