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
        Schema::table('likes', function (Blueprint $table) {
            $table->dropForeign('likes_clip_id_foreign');
            $table->dropForeign('likes_g_user_id_foreign');
            $table->dropColumn('clip_id');
            $table->dropColumn('g_user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('likes', function (Blueprint $table) {
            // $table->foreignId('clip_id')->constrained('clips');
            // $table->foreignId('g_user_id')->constrained('users');
        });
    }
};
