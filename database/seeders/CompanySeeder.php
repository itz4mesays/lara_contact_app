<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('companies')->truncate(); //do delete existing but will most likely through an error if it has a foreign value
        DB::table('companies')->delete(); //this will work if onDelete('cascade') is specified while creating migration file

        //Third option is remove first two and run the command below in the terminal
        //php artisan migrate:fresh --seed

        
        // $faker = \Faker\Factory::create();
        // //Insert Companies
        // foreach(range(1,10) as $item){
        //     $companies[] = [
        //         'name' => $faker->name(),
        //         'address' => $faker->address(),
        //         'email' => $faker->safeEmail(),
        //         'website' => $faker->url(),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //         'user_id' => User::pluck('id')->random()
        //     ];
        // }

        // DB::table('companies')->insert($companies);
        // Company::factory()->count(15)->create();
    }
}
