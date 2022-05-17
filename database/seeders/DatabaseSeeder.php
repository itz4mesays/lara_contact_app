<?php

namespace Database\Seeders;

use Database\Factories\CompaniesFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;
use App\Models\Company;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CompanySeeder::class,
            ContactSeeder::class,
            UserSeeder::class
        ]);
        // Contact::factory()->count(50)->create();
        // Company::factory()->count(40)->create();
    }
}
