<?php

namespace Database\Seeders;

use App\Models\AppSetting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AppSetting::insert([
            'app_version' => "1.0",
            'app_feature' => "feature 1||feature 2||feature 3",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
