<?php

namespace App\Http\Controllers\Admin;

use App\Models\Game;
use App\Models\Winner;
use App\Models\GameSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $games = Game::where('draw_time', '>', now())->where('is_active', 1)->with('activeTickets')->get();

        return view("pages.admin.dashboard", [
            "games" => $games
        ]);
    }

    public function runGame($game_id)
    {
        // Winner::query()->truncate();
        // ini_set('max_execution_time', 300);

        $setting = GameSetting::first();
        $game = Game::with('activeTickets', 'activeValue')->find($game_id);

        $tickets = $game->activeTickets;
        $value = $game->activeValue;

        if (!is_null($value)) {
            $val_nums = explode(',', $value->numbers);
            $val_power = (int)$value->powerball;

            // powerplay random number choose
            $powerplay_arr = explode(',', $setting->powerplay_values);
            $powerplay_val = $powerplay_arr[array_rand($powerplay_arr, 1)];

            foreach ($tickets as $ticket) {
                $win_arr = [];
                $prize = 0;
                $is_jackpot = false;

                $ticket_nums = explode(',', $ticket->numbers);
                foreach ($ticket_nums as $tic_num) {
                    if (in_array($tic_num, $val_nums)) {
                        array_push($win_arr, $tic_num);
                    }
                }

                // non-jackpot & jackpot prizes
                $njprizes = explode(',', $setting->nonjacpot_prizes);
                $jprize = (float)$ticket->game->jackpot_prize;

                if (count($win_arr) > 0) {
                    // price count
                    switch (count($win_arr)) {
                        case 5:
                            if ($ticket->powerball == $val_power) {
                                $prize = $jprize;
                                $is_jackpot = true;
                            } else {
                                $prize = $njprizes[4];
                            }
                            break;
                        case 4:
                            if ($ticket->powerball == $val_power) {
                                $prize = $njprizes[4];
                            } else {
                                $prize = $njprizes[3];
                            }
                            break;
                        case 3:
                            if ($ticket->powerball == $val_power) {
                                $prize = $njprizes[3];
                            } else {
                                $prize = $njprizes[2];
                            }
                            break;
                        case 2:
                            if ($ticket->powerball == $val_power) {
                                $prize = $njprizes[2];
                            } else {
                                $prize = $njprizes[1];
                            }
                            break;
                        case 1:
                            if ($ticket->powerball == $val_power) {
                                $prize = $njprizes[1];
                            } else {
                                $prize = $njprizes[0];
                            }
                            break;

                        default:
                            $prize = 0;
                            break;
                    }

                    // if user choosed powerplay
                    if ($ticket->is_powerplay) {
                        // if not jackpot
                        if ($is_jackpot === false) {
                            // if 5 ball matches
                            if (count($win_arr) == 5) {
                                $prize = $prize * $powerplay_arr[0];
                            } else {
                                $prize = $prize * $powerplay_val;
                            }
                        }
                    }

                    if ($is_jackpot === true) {
                        array_push($win_arr, $ticket->powerball);
                    }

                    Winner::create([
                        'ticket_id' => $ticket->id,
                        'game_id' => $game_id,
                        'value_id' => $value->id,
                        'prize' => $prize,
                        'powerplay' => $powerplay_val,
                        'played_nums' => implode(',', $win_arr),
                        'is_jackpot' => $is_jackpot,
                    ]);
                }

                // disable ticket & value after draw if set by admin
                $ticket->update(['is_played' => true]);
                $value->update(['is_active' => false]);
                $game->update([
                    'is_active' => false,
                    'played_at' => now()
                ]);
            }

            return response()->json(['status' => 'success', 'message' => 'Winner Selected']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Please Set a Value First']);
        }
    }
}
