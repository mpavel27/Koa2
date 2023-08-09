<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MainController;

class AdminController extends Controller
{
    public function viewIndex() {
        $online_players = MainController::getPlayersOnline();
        $online_players_24 = MainController::getPlayersOnline24h();
        $accounts = MainController::getAccountsCount();
        $characters = MainController::getPlayersCount();
        return view('admin.index', compact([
            'online_players',
            'online_players_24',
            'accounts',
            'characters',
        ]));
    }

    public function viewLogin() {
        return view('admin.login');
    }
}
