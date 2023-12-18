<?php

namespace Database\Seeders;

use App\Models\Rule;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rule::insert([
            [
                'title' => 'HOW IT WORKS',
                'description' => 'Powerball is a six (6) number draw game offered by the State Lottery.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'SUMMARY',
                'description' => 'To order Powerball, you will choose five (5) numbers from 1-69 and a Powerball from 1-26. To enjoy a random set of lucky numbers, try selecting Quick Pick. If no one wins the jackpot, it rolls over into the next draw for an even bigger prize. Lotto.com also offers the option to enroll your ticket as a subscription so you never miss a draw!',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'NUMBER SELECTION',
                'description' => 'In Powerball, you choose five (5) numbers from 1-69 and a Powerball from 1-26. These numbers are then scored against the winning numbers to see if they match. The more chosen numbers that match the winning numbers, the higher the prize. Match all six (6) numbers including the Powerball and win the jackpot!',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'QUICK PICK',
                'description' => 'Looking to change up your luck? Let the Quick Pick tool select a random set of lucky numbers. Each line gives you the chance to choose your lucky numbers or use Quick Pick. Lucky numbers can continue to be changed until checkout.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'LINES',
                'description' => 'Each line on a ticket is a separate entry into the next draw. Powerball is available with up to five (5) lines on each ticket, making it easy to maximize your chances of success.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'JACKPOT',
                'description' => 'The Powerball jackpot for matching all six (6) numbers including the Powerball starts at $20 Million. Each time a draw is held without a jackpot winner, the prize rolls into the next draw and continues to grow. The jackpot will continue to increase until a winner is found, with prizes often increasing to hundreds of millions of dollars. That’s a lot of zeroes!',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'WAGER',
                'description' => 'Powerball can be enjoyed with a wager of just $2. A new wager is added for each additional line included on the ticket.',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
