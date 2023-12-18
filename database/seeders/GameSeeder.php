<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Game::insert([
            [
                'title' => 'Morning Game',
                'drawtime' => '2023-09-25 08:05:37',
                'cutoff' => '2023-09-21 13:05:37',
                'jackpot_prize' => 120,
                'ticket_price' => 1.14,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Evening Game',
                'drawtime' => '2023-09-25 16:05:37',
                'cutoff' => '2023-09-21 13:05:37',
                'jackpot_prize' => 90,
                'ticket_price' => 0.04,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Night Game',
                'drawtime' => '2023-09-25 22:05:37',
                'cutoff' => '2023-09-21 13:05:37',
                'jackpot_prize' => 95,
                'ticket_price' => 0.08,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
