<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *  @return void
     */

    public function run()
    {
        DB::table('activities')->insert([
                'activity_name' => 'Ceramah Wirid',
                'description' => 'Ceramah wirid selasa malam',
                'penceramah_name' => 'Ismet Eka Putra, ST, MT',
                'schedule_start' => '2023-06-06 19:00:00',
                'schedule_end' => '2023-06-06 19:30:00',
                'status' => 0,
                'submission_status' => 1,
                'user_id' => 1,
                'activity_categories_id' => 2,
        ]);
        DB::table('activities')->insert([
                'activity_name' => 'Ceramah Wirid',
                'description' => 'Ceramah wirid selasa malam',
                'schedule_start' => '2023-06-13 19:00:00',
                'schedule_end' => '2023-06-13 19:30:00',
                'status' => 0,
                'submission_status' => 1,
                'user_id' => 1,
                'activity_categories_id' => 2,
        ]);
        DB::table('activities')->insert([
                'activity_name' => 'Ceramah Wirid',
                'description' => 'Ceramah wirid selasa malam',
                'schedule_start' => '2023-06-20 19:00:00',
                'schedule_end' => '2023-06-20 19:30:00',
                'status' => 0,
                'submission_status' => 1,
                'user_id' => 1,
                'activity_categories_id' => 2,
        ]);
    }
}
