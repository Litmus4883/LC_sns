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
            $table->timestamps($precision = 0);
            $table->softDeletes();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('image_id')->nullable();
            $table->foreignId('reply_id')->nullable();
            $table->foreignId('tug_id')->nullable();
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
