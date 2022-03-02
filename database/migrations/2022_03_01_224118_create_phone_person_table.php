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
        Schema::create('phone_person', function (Blueprint $table) {
            $table->uuid('person_id')->primary();
            $table->string('phone');
            $table->unsignedTinyInteger('country_id')->nullable();
            $table->timestamps();

            $table->unique(['phone', 'country_id'], 'unique_phone_person');

            $table->foreign('person_id', 'fk_phone_person_people')->references('uuid')->on('people')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('country_id', 'fk_country_phone_person')->references('id')->on('countries')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phone_person');
    }
};
