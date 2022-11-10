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
        Schema::create('hospitals', function (Blueprint $table) {
                $table->id();
                $table->string('nom_clinique')->default('CLINIQUE SABAH');
                $table->string('adress_clinique')->default('50 BLOC IMLIL AVENUE NYW');
                $table->string('city')->default('maroc');
                $table->string('zip_code')->default('43000');
                $table->string('tel_clinique')->default('0688.88.88.88');
                $table->string('fax_clinique')->default('0525.33.33.33');
                $table->string('inp_clinique')->default('070003926');
                $table->string('ice')->default('001874469000057');
                $table->string('email')->default('070003926');
                $table->string('if')->nullable();
                $table->string('tp')->nullable();
                $table->string('cnss')->nullable();
                $table->date('date_creation')->nullable();
                $table->string('inp_clinique_barcode')->default('storage\app\public\inp_tst_barcode.PNG');
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
        Schema::dropIfExists('hospitals');
    }
};
