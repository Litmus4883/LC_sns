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
        if(Schema::hasTable('posts')){
            return;
        }
        
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('comment');
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('user_id')->nullable()->cascadeOnDelete();
            $table->foreignId('image_id')->nullable()->cascadeOnDelete();
            $table->foreignId('reply_id')->nullable()->cascadeOnDelete();
            $table->foreignId('tug_id')->nullable()
            ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
