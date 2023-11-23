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
        if(Schema::hasTable('post_tug')){
            return;
        }
            
        Schema::create('post_tug', function (Blueprint $table) {
            $table->foreignId('post_id')->nullable()->constrained('posts');
            $table->foreignId('tug_id')->nullable()->constrained('tugs');
            $table->primary(['post_id', 'tug_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tug');
    }
};
