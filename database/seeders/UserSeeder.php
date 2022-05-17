<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(50)->create()->each(function($user){
            $user->contacts()->saveMany(
                Contact::factory()->count(50)->create()
            );

            $user->companies()->saveMany(
                Company::factory()->count(50)->create()
            );
        });
    }
}
