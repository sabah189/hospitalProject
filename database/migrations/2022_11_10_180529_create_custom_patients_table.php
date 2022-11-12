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
        Schema::create('custom_patients', function (Blueprint $table) {
            $table->id();
            $table->string('code_patient')->unique();
            $table->string('cin_number')->unique();
            $table->string('first_name');
            $table->string('second_name') ;
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->mediumText('adress')->nullable();
            $table->string('nationality')->nullable();
            $table->string('city')->nullable();
            $table->string('gender')->nullable();
            $table->date('date_birthday')->nullable();
            $table->string('family_situation')->nullable();
            $table->string('profile_picture')->default('/storage/defaultProfile.png');
            $table->mediumText('notes')->nullable() ;
            $table->integer('status')->default(1) ;

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
        Schema::dropIfExists('custom_patients');
    }
};
