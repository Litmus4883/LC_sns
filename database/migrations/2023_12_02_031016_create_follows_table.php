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
        Schema::create('follows', function (Blueprint $table) {
            $table->foreignId('follower_id')->constraint('users')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('followee_id')->constraint('users')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->primary(['follower_id', 'followee_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
};
