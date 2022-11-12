<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\Models\Departement;
use Faker\Factory as Faker;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Models\Departement');
 
        for($i = 1 ; $i <= 50 ; $i++){
    /*         $countryRandom = DB::table('countries') ->inRandomOrder()->first();
            $cityRandom = DB::table('cities') ->inRandomOrder()->first(); */
 
            DB::table('departements')->insert([
                'created_at' => \Carbon\Carbon::now(),
                'Updated_at' => \Carbon\Carbon::now(),
                'code_depart'=>$faker->unique()->numerify('EAN######'),
                'name'=> $faker->unique()->word(),            
                'localisation'=> $faker->unique()->word(),
                'notes'=>$faker->word(),
            ]);
        }
    }
}
