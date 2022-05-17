<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Contact;
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
        // $companies = [];
        // foreach (range(1,15) as $ind) {
        //     $companies[] = [
        //         'name' => $faker->name,
        //         'address' => $faker->address,
        //         'email' => $faker->email,
        //         'website' => $faker->url
        //     ];
        // }
        
        // DB::table('companies')->insert($companies);
        Company::factory()->count(15)->create();
    }
}
