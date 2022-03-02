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
        Schema::create('address_person', function (Blueprint $table) {
            $table->uuid('person_id')->primary();
            $table->unsignedBigInteger('city_id');
            $table->string('neighbor', 50);
            $table->string('address', 100);
            $table->timestamps();

            $table->foreign('person_id', 'fk_address_person')->references('uuid')->on('people')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_person');
    }
};
