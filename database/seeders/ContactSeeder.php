<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Contact;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->delete(); //this will work if onDelete('cascade') is specified while creating migration file

        //Insert Contacts
        $faker  = Factory::create();

        foreach (range(1,550) as $ind) {
            $contacts[] = [
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'phone' => $faker->phoneNumber(),
                'email' => $faker->safeEmail(),
                'address' => $faker->address(),
                'company_id' => Company::pluck('id')->random(),
                'user_id' => User::pluck('id')->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('contacts')->insert($contacts);
        // Contact::factory()->count(30)->create(); //create method will return a collection and can be looped through
    }
}
