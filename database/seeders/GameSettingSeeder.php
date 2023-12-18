<?php

namespace Database\Seeders;

use App\Models\GameSetting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GameSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GameSetting::insert([
            'powerplay_values' => "2,3,4,5,10",
            'powerplay_price' => 0.14,
            'nonjacpot_prizes' => "4,7,100,50000,1000000",
            'max_num' => 69,
            'max_powerball' => 26,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
