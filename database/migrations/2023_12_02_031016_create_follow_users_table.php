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
    {   #中間テーブルの名前は本来'user_user'だが、便宜上'follow_users'
        Schema::create('follow_users', function (Blueprint $table) {
            $table->id();
            #$table->unsignedBigInteger('followed_user_id')->index();
            #$table->unsignedBigInteger('following_user_id')->index();
            $table->foreignId('followed_user_id')->references('id')->on('users')->cascadeonDelete();
            $table->foreignId('following_user_id')->references('id')->on('users')->cascadeOnDelete();
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
        Schema::dropIfExists('follow_users');
    }
};
