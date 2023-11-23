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
        if(Schema::hasTable('image_post')){
            return;
        }
        
        Schema::create('image_post', function (Blueprint $table) {
            $table->foreignId('image_id')->nullable()->constrained('images');
            $table->foreignId('post_id')->nullable()->constrained('posts');          
            $table->primary('image_id', 'post_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_post');
    }
};
