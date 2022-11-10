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
        Schema::create('soins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->mediumText('description')->nullable();
            $table->string('type')->nullable();
            $table->integer('criticity')->nullable();

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
        Schema::dropIfExists('soins');
    }
};
