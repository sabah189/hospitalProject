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
        Schema::create('infirmieres', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dept_id')->unsigned();
            $table->foreign('dept_id')
                ->references('id')
                ->on('departements')
                ->onDelete('restrict')
                ->onUpdate('restrict'); 
            $table->string('code_interne')->unique();
            $table->string('grade')->nullable();
            $table->date('date_integration')->nullable();
            $table->string('first_name');
            $table->string('second_name') ;
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->mediumText('adress')->nullable();
            $table->integer('nationality')->nullable();
            $table->string('cin_number')->nullable()->unique();
            $table->integer('city')->nullable();
            $table->string('gender')->nullable();
            $table->string('date_birthday')->nullable();
            $table->string('family_situation')->nullable();
            $table->string('profile_picture')->default('/storage/defaultProfile.png');
            $table->string('bank_name')->nullable() ;
            $table->string('bank_account')->nullable() ;
            $table->string('mutuale_name')->nullable() ;

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
        Schema::dropIfExists('infirmieres');
    }
};
