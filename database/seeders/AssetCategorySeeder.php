<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asset_categories')->insert([
            'category_name' => 'Kendaraan',
        ]);
        DB::table('asset_categories')->insert([
            'category_name' => 'Elektronik',
        ]);
        DB::table('asset_categories')->insert([
            'category_name' => 'Perlengkapan',
        ]);
    }
}
