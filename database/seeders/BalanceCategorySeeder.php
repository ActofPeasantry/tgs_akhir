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
            'category_name' => 'Infak Anak Yatim',
            'debit_credit' => 1
        ]);
        DB::table('balance_categories')->insert([
            'category_name' => 'Infak kotak amal',
            'debit_credit' => 1,
        ]);
        DB::table('balance_categories')->insert([
            'category_name' => 'Donatur Bulanan',
            'debit_credit' => 1,
        ]);
    }
}
