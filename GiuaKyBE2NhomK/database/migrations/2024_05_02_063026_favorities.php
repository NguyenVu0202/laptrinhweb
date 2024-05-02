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
        Schema::create('favorities', function (Blueprint $table) {
            $table->id('favorite_id');
            $table->string('favorite_name', 100);
            $table->string('favorite_description', 100);      
            $table->rememberToken(); 
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
        Schema::dropIfExists('favorities');
    }
};
