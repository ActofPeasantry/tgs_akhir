<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivityCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activity_categories')->insert([
            'category_name' => 'Pesantren',
        ]);
        DB::table('activity_categories')->insert([
            'category_name' => 'Ceramah Mingguan',
        ]);
    }
}
