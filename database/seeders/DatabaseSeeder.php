<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ad;
use App\Models\advertiser;
use App\Models\category;
use App\Models\tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        advertiser::factory()->count(100)->create();
        category::factory()->count(120)->create();
        tag::factory()->count(20)->create();
        ad::factory()->count(50)->create();
    }
}
