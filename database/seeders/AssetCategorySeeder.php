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
            'category_type' => 1,
        ]);
        DB::table('asset_categories')->insert([
            'category_name' => 'Surat Tanah',
            'category_type' => 2,
        ]);
    }
}
