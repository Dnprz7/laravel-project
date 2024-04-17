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
        Schema::table('dislikes', function (Blueprint $table) {
            $table->foreign(['image_id'], 'fk_dislikes_images')->references(['id'])->on('images')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['user_id'], 'fk_dislikes_users')->references(['id'])->on('users')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dislikes', function (Blueprint $table) {
            $table->dropForeign('fk_dislikes_images');
            $table->dropForeign('fk_dislikes_users');
        });
    }
};
