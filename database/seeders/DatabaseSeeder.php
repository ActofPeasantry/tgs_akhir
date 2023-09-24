<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Asset;
use App\Models\Balance;
use App\Models\Santri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(UserSeeder::class);
        $this->call(BalanceCategorySeeder::class);
        Balance::factory()->count(500)->create();
        $this->call(ActivityCategorySeeder::class);
        $this->call(ActivitySeeder::class);
        $this->call(AssetCategorySeeder::class);
        // Asset::factory()->count(3)->create();
        // Santri::factory()->count(10)->create();


        // Activity::factory()->count(10)->create();
        // $this->call(RoleSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
