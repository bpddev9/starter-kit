<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\User;
use App\Models\Promocode;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $numbers = range(1,69);
        $powerball = range(1,26);

        shuffle($numbers);

        $gnums = array_slice($numbers, 0, 5);
        $gpower = $powerball[array_rand($powerball, 1)];

        return [
            'user_id' => User::all()->unique()->random()->id,
            'game_id' => Game::all()->random()->id,
            'numbers' => implode(',', $gnums),
            'powerball' => $gpower,
            'is_powerplay' => fake()->boolean(),
            'promocode' => Promocode::all()->random()->name,
            'paid' => fake()->numberBetween(2.00,3.00),
            'wallet_type' => fake()->randomElement(['etherium', 'bitcoin'])
        ];
    }
}
