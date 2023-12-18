<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(100)->create();

        $this->call([
            // AdminSeeder::class,
            // GameSettingSeeder::class,
            // AppSettingSeeder::class,
            // PromocodeSeeder::class,
            // RuleSeeder::class,
            // FaqSeeder::class,
            // GameSeeder::class,
        ]);

        Ticket::factory(200)->create();
    }
}
