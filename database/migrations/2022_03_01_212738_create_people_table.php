<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Create the table for people (person).
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('firstname', 50);
            $table->string('lastname', 50);
            $table->unsignedTinyInteger('gender_id')->nullable();
            $table->string('private_email');
            $table->date('birthdate')->nullable();
            $table->timestamps();

            $table->unique('private_email', 'unique_private_email_person');
            
            $table->foreign('gender_id', 'fk_gender_person')->references('id')->on('genders')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
};
