<?php

namespace App\Http\Controllers;

use App\Season;
use Illuminate\Http\Request;

class GoalsController extends Controller
{
    /**
     *
     * Returns a list of players that have scored
     * in the season that started the latest.
     *
     * @return App\Player $players Collection of players
     */
    public function latest()
    {
        $season = Season::with(['players' => function($query) {
            $query->orderBy('goals', 'desc');
        }])->orderBy('start_date')->first();

        return response()->json(['players' => $season->players]);
    }

    /**
     *
     * Get the goal scorers and their goals count
     * for the given season
     *
     * @param  App\Season $season Season to query for top goalscorers
     * @return App\Player $players Collection of players
     */

    public function season(Season $season)
    {
        $seasonPlayers = Season::with(['players' => function($query) {
            $query->orderBy('goals', 'desc');
        }])->orderBy('start_date')->find($season->id);

        return response()->json(['players' => $seasonPlayers->players])
    }
}
