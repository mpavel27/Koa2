<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MainController;

class RankingController extends Controller
{
    public function viewPlayers() {
        $ch1 = MainController::checkPortOpen(env('CH1_PORT'));
        $ch2 = MainController::checkPortOpen(env('CH2_PORT'));
        $ch3 = MainController::checkPortOpen(env('CH3_PORT'));
        $ch4 = MainController::checkPortOpen(env('CH4_PORT'));
        $players = MainController::getAllPlayers();
        return view('ranking.players', compact(['ch1', 'ch2', 'ch3', 'ch4', 'players']));
    }

    public function viewGuilds()
    {
        $ch1 = MainController::checkPortOpen(env('CH1_PORT'));
        $ch2 = MainController::checkPortOpen(env('CH2_PORT'));
        $ch3 = MainController::checkPortOpen(env('CH3_PORT'));
        $ch4 = MainController::checkPortOpen(env('CH4_PORT'));
        $guilds = MainController::getAllGuilds();
        return view('ranking.guilds', compact(['ch1', 'ch2', 'ch3', 'ch4', 'guilds']));
    }
}
