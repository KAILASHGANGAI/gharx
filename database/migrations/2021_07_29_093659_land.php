<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Land extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_shoter', function (Blueprint $table) {
            $table->id();
            $table->string('uploadedby')->nullable();
            $table->string('name');
            $table->string('phone_number')->nullable();
            $table->string('address_of_land');
            $table->integer('price');
            $table->string('type')->nullable();
            $table->string('area');
            $table->string('east');
            $table->string('west');
            $table->string('north');
            $table->string('south');
            $table->string('discription');
            $table->string('images');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('land_shoter');
        
    }
}
