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
        Schema::create('cities', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedSmallInteger('state_id');
            $table->string('value', 25);
            $table->string('slug', 5);
            $table->timestamps();

            $table->unique(['state_id', 'value', 'slug'], 'unique_states');
            
            $table->foreign('state_id', 'fk_state_cities')->references('id')->on('states')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
};
