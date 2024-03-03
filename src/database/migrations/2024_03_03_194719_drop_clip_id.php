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
            $table->dropForeign('category_clip_clip_id_foreign');
            $table->dropColumn('clip_id');
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
            $table->foreignId('clip_id')->constrained('clips')->nullable();
        });
    }
};
