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
        Schema::create('hospitalisations', function (Blueprint $table) {
            $table->id();
            $table->string('num_dossier')->nullable()->unique();
            $table->integer('type')->default(1); // 1- Hospitalisation 2- urgence 3- Externe
            $table->date('date_entree')->nullable();
           
            $table->bigInteger('doctor_id')->nullable()->unsigned();
            $table->foreign('doctor_id')
                  ->references('id')
                  ->on('medecins')
                  ->onDelete('restrict')
                  ->onUpdate('restrict'); 
 
            $table->bigInteger('dept_id')->nullable()->unsigned();
            $table->foreign('dept_id')
                ->references('id')
                ->on('departements')
                ->onDelete('restrict')
                ->onUpdate('restrict'); 
 
            $table->bigInteger('patient_id')->nullable()->unsigned();
            $table->foreign('patient_id')
                ->references('id')
                ->on('custom_patients')
                ->onDelete('restrict')
                ->onUpdate('restrict');
 
        /*     $table->bigInteger('assureur_id')->nullable()->unsigned();
            $table->foreign('assureur_id')
                ->references('id')
                ->on('assureurs')
                ->onDelete('restrict')
                ->onUpdate('restrict');
  */
            /* $table->bigInteger('assurance_id')->nullable()->unsigned();
            $table->foreign('assurance_id')
                ->references('id')
                ->on('assurances')
                ->onDelete('restrict')
                ->onUpdate('restrict'); */
               
            /* $table->integer('own_assureur')->default(0); */
            $table->integer('lien_parental')->default(1);
            $table->date('date_sortie')->nullable();
            $table->string('num_lit')->nullable();
/*          $table->string('infirmier_surveillant')->nullable();
 */         $table->string('categorie')->nullable();
            $table->string('pathologie')->nullable();
            $table->string('nature_hosp')->default(1);
            $table->string('description')->nullable();
 
           
            /* $table->float('montant')->nullable();
            $table->integer('mode_paiement')->default(1); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospitalisations');
    }
};
