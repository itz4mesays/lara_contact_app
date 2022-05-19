<?php

namespace Database\Seeders;

use Database\Factories\CompaniesFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;
use App\Models\Company;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(5)->create();
        Company::factory()->hasContacts(5)->count(50)->create();
    }
}
