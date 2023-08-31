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
                'schedule_start' => '2023-08-01 19:00:00',
                'schedule_end' => '2023-08-01 19:30:00',
                'budget' => 110000,
                'status' => 0,
                'submission_status' => 0,
                'user_id' => 1,
                'activity_categories_id' => 10,
        ]);
        DB::table('activities')->insert([
                'activity_name' => 'Ceramah Wirid',
                'description' => 'Ceramah wirid selasa malam',
                'schedule_start' => '2023-08-08 19:00:00',
                'schedule_end' => '2023-08-08 19:30:00',
                'budget' => 190000,
                'status' => 0,
                'submission_status' => 0,
                'user_id' => 1,
                'activity_categories_id' => 10,
        ]);
        DB::table('activities')->insert([
                'activity_name' => 'Ceramah Wirid',
                'description' => 'Ceramah wirid selasa malam',
                'schedule_start' => '2023-08-15 19:00:00',
                'schedule_end' => '2023-08-15 19:30:00',
                'budget' => 170000,
                'status' => 0,
                'submission_status' => 0,
                'user_id' => 1,
                'activity_categories_id' => 10,
        ]);
        DB::table('activities')->insert([
                'activity_name' => 'Ceramah Wirid',
                'description' => 'Ceramah wirid selasa malam',
                'schedule_start' => '2023-08-22 19:00:00',
                'schedule_end' => '2023-08-22 19:30:00',
                'budget' => 140000,
                'status' => 0,
                'submission_status' => 0,
                'user_id' => 1,
                'activity_categories_id' => 10,
        ]);
        DB::table('activities')->insert([
                'activity_name' => 'Ceramah Wirid',
                'description' => 'Ceramah wirid selasa malam',
                'schedule_start' => '2023-08-29 19:00:00',
                'schedule_end' => '2023-08-29 19:30:00',
                'budget' => 130000,
                'status' => 0,
                'submission_status' => 0,
                'user_id' => 1,
                'activity_categories_id' => 10,
        ]);
        DB::table('activities')->insert([
                'activity_name' => 'Ceramah Wirid',
                'description' => 'Ceramah wirid jumat malam',
                'penceramah_name' => 'Ismet Eka Putra, ST, MT',
                'schedule_start' => '2023-08-04 19:00:00',
                'schedule_end' => '2023-08-04 19:30:00',
                'budget' => 120000,
                'status' => 0,
                'submission_status' => 0,
                'user_id' => 1,
                'activity_categories_id' => 11,
        ]);
        DB::table('activities')->insert([
                'activity_name' => 'Ceramah Wirid',
                'description' => 'Ceramah wirid selasa malam',
                'schedule_start' => '2023-08-11 19:00:00',
                'schedule_end' => '2023-08-11 19:30:00',
                'budget' => 150000,
                'status' => 0,
                'submission_status' => 0,
                'user_id' => 1,
                'activity_categories_id' => 11,
        ]);
        DB::table('activities')->insert([
                'activity_name' => 'Ceramah Wirid',
                'description' => 'Ceramah wirid selasa malam',
                'schedule_start' => '2023-08-18 19:00:00',
                'schedule_end' => '2023-08-18 19:30:00',
                'budget' => 100000,
                'status' => 0,
                'submission_status' => 0,
                'user_id' => 1,
                'activity_categories_id' => 11,
        ]);
        DB::table('activities')->insert([
                'activity_name' => 'Ceramah Wirid',
                'description' => 'Ceramah wirid selasa malam',
                'schedule_start' => '2023-08-25 19:00:00',
                'schedule_end' => '2023-08-25 19:30:00',
                'budget' => 220000,
                'status' => 0,
                'submission_status' => 0,
                'user_id' => 1,
                'activity_categories_id' => 11,
        ]);
        DB::table('activities')->insert([
                'activity_name' => 'Ceramah Wirid',
                'description' => 'Ceramah wirid selasa malam',
                'penceramah_name' => 'Ismet Eka Putra, ST, MT',
                'schedule_start' => '2023-09-05 19:00:00',
                'schedule_end' => '2023-09-05 19:30:00',
                'budget' => 50000,
                'status' => 0,
                'submission_status' => 0,
                'user_id' => 1,
                'activity_categories_id' => 10,
        ]);
        DB::table('activities')->insert([
                'activity_name' => 'Ceramah Wirid',
                'description' => 'Ceramah wirid selasa malam',
                'schedule_start' => '2023-09-12 19:00:00',
                'schedule_end' => '2023-09-12 19:30:00',
                'budget' => 200000,
                'status' => 0,
                'submission_status' => 0,
                'user_id' => 1,
                'activity_categories_id' => 10,
        ]);
        DB::table('activities')->insert([
                'activity_name' => 'Ceramah Wirid',
                'description' => 'Ceramah wirid selasa malam',
                'schedule_start' => '2023-09-19 19:00:00',
                'schedule_end' => '2023-09-19 19:30:00',
                'budget' => 300000,
                'status' => 0,
                'submission_status' => 0,
                'user_id' => 1,
                'activity_categories_id' => 10,
        ]);
        DB::table('activities')->insert([
                'activity_name' => 'Ceramah Wirid',
                'description' => 'Ceramah wirid selasa malam',
                'schedule_start' => '2023-09-26 19:00:00',
                'schedule_end' => '2023-09-26 19:30:00',
                'budget' => 100000,
                'status' => 0,
                'submission_status' => 0,
                'user_id' => 1,
                'activity_categories_id' => 10,
        ]);
    }
}
