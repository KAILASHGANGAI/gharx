<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Realstate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realstate', function (Blueprint $table) {
            $table->id();
            $table->string('owner_name');
            $table->text('contact');
            $table->string('city');

            $table->string('tole');
            $table->string('nearby')->nullable();
            $table->string('property_type');
            $table->string('property_for');
            $table->integer('Price');
            $table->boolean('popular')->default(0);
            $table->string('total_bedroom');
            $table->boolean('toilet_bathroom');
            $table->boolean('kitchen');
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
        Schema::dropIfExists('realstate');
    }
}
