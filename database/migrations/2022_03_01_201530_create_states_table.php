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
        Schema::create('states', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedTinyInteger('country_id');
            $table->string('value', 25);
            $table->string('slug', 5);
            $table->timestamps();

            $table->unique(['country_id', 'value', 'slug'], 'unique_states');
            
            $table->foreign('country_id', 'fk_country_states')->references('id')->on('countries')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
};
