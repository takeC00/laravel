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
        Schema::table('rooms', function (Blueprint $table) {
          $table->unsignedBigInteger('user_id')->after('id');

          //usersテーブルのidカラムにuser_idを関連付ける
          $table->foreign('user_id')->references('id')->on('users');
          $table->string('post_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropForeign('rooms_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
};
