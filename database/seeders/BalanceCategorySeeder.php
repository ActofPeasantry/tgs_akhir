<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BalanceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('balance_categories')->insert([
            'category_name' => 'SPP',
        ]);
        DB::table('balance_categories')->insert([
            'category_name' => 'KOTAK AMAL',
        ]);
        DB::table('balance_categories')->insert([
            'category_name' => 'WAKAF',
        ]);
        DB::table('balance_categories')->insert([
            'category_name' => 'DONASI',
        ]);
        DB::table('balance_categories')->insert([
            'category_name' => 'Pembangunan',
        ]);
        DB::table('balance_categories')->insert([
            'category_name' => 'Sisa Kas',
        ]);
        DB::table('balance_categories')->insert([
            'category_name' => 'Donatur Bulanan',
        ]);
        DB::table('balance_categories')->insert([
            'category_name' => 'Anak Yatim',
        ]);
        DB::table('balance_categories')->insert([
            'category_name' => 'Muallaf & Fakir Miskin',
        ]);
    }
}
