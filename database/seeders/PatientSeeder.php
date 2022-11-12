<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\Models\CustomPatient;
use Faker\Factory as Faker;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Models\CustomPatient');
 
        for($i = 1 ; $i <= 50 ; $i++){
    /*         $countryRandom = DB::table('countries') ->inRandomOrder()->first();
            $cityRandom = DB::table('cities') ->inRandomOrder()->first(); */
 
            DB::table('custom_patients')->insert([
                'created_at' => \Carbon\Carbon::now(),
                'Updated_at' => \Carbon\Carbon::now(),
                'code_patient'=>$faker->unique()->numerify('EAN######'),
                'cin_number'=>$faker->unique()->numerify('EE######'),
                'first_name'=> $faker->unique()->word(),            
                'second_name'=> $faker->unique()->word(),
                'email'=>$faker->unique()->safeEmail,
                'telephone'=> $faker->e164PhoneNumber,
                'adress'=>$faker->text($maxNbChars = 50),
                'nationality'=>$faker->word(),
                'city'=>$faker->word(),
                'gender'=>$faker->word(),
                'date_birthday'=>$faker->date($format = 'Y-m-d', $max = 'now'),
                'family_situation'=>$faker->word(),
                'notes'=>$faker->word(),
            ]);
        }
    }

}
