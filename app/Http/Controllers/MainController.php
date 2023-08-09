<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\User;
use App\Models\Guild;
use App\Models\PlayerIndex;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MainController extends Controller
{
    public function viewIndex() {
        $ch1 = $this->checkPortOpen(env('CH1_PORT'));
        $ch2 = $this->checkPortOpen(env('CH2_PORT'));
        $ch3 = $this->checkPortOpen(env('CH3_PORT'));
        $ch4 = $this->checkPortOpen(env('CH4_PORT'));
        $online_players = $this->getPlayersOnline();
        $online_players_24 = $this->getPlayersOnline24h();
        $accounts = $this->getAccountsCount();
        $characters = $this->getPlayersCount();
        $guilds = $this->getGuildsCount();
        $topPlayers = $this->getTopPlayers();
        $topGuilds = $this->getTopGuilds();
        return view('index', compact([
            'ch1',
            'ch2',
            'ch3',
            'ch4',
            'online_players',
            'online_players_24',
            'accounts',
            'characters',
            'guilds',
            'topPlayers',
            'topGuilds'
        ]));
    }

    public static function toMD5($pass, $hex = true)
    {
        $pass_st1 = sha1($pass, true);
        $output = sha1($pass_st1, !$hex);
        return '*' . strtoupper($output);
    }

    public static function checkPortOpen($port) {
        if(@fsockopen(env('SERVER_IP'), $port)) {
            return true;
        } else {
            return false;
        }
    }

    public static function getPlayersOnline()
    {
        $online = Player::where('last_play', '>', DB::raw('DATE_SUB(NOW(), INTERVAL 5 MINUTE)'))->count();
        return $online;
    }

    public static function getPlayersOnline24h()
    {
        $online = Player::where('last_play', '>', DB::raw('DATE_SUB(NOW(), INTERVAL 24 HOUR)'))->count();
        return $online;
    }

    public static function getAccountsCount()
    {
        $accounts = User::count();
        return $accounts;
    }

    public static function getPlayersCount()
    {
        $players = Player::count();
        return $players;
    }

    public function getGuildsCount()
    {
        $guilds = Guild::count();
        return $guilds;
    }

    public function getTopPlayers(int $count = 10)
    {
        $players = Player::with('index')->where('name', 'not like', '%[%')
            ->orderBy('level', 'DESC')
            ->orderBy('exp', 'DESC')
            ->limit($count)
            ->get();
        $topPlayers = [];
        foreach($players as $key => $player) {
            $topPlayers[$key+1] = [
                'name' => $player->name,
                'class' => $this->getClassNameByJob($player->job),
                'empire' => $this->getEmpireName($player->index->empire),
                'level' => $player->level
            ];
        }
        return $topPlayers;
    }

    public static function getAllPlayers()
    {
        $players = Player::with('index')->where('name', 'not like', '%[%')
            ->orderBy('level', 'DESC')
            ->orderBy('exp', 'DESC')
            ->get();
        $topPlayers = [];
        foreach($players as $key => $player) {
            $topPlayers[$key+1] = [
                'name' => $player->name,
                'class' => MainController::getClassNameByJob($player->job),
                'empire' => MainController::getEmpireName($player->index->empire),
                'level' => $player->level
            ];
        }
        return $topPlayers;
    }

    public static function getClassNameByJob($id) {
        if($id == 0 || $id == 4) {
            return 'Warrior';
        } elseif($id == 1 || $id == 5) {
            return 'Ninja';
        } elseif($id == 2 || $id == 6) {
            return 'Sura';
        } elseif($id == 3 || $id == 7) {
            return 'Saman';
        }
    }

    public static function getPlayerClass($id) {
        $player = Player::where('id', $id)->first();
        if($player->job == 0 || $player->job == 4) {
            return 'Warrior';
        } elseif($player->job == 1 || $player->job == 5) {
            return 'Ninja';
        } elseif($player->job == 2 || $player->job == 6) {
            return 'Sura';
        } elseif($player->job == 3 || $player->job == 7) {
            return 'Saman';
        }
    }

    public static function getEmpireName($empire) {
        switch($empire) {
            case 1:
                return 'Shinsoo'; // rosu
            case 2:
                return 'Chunjo'; // galben
            case 3:
                return 'Jinno'; // albastru
        }
    }

    public function getTopGuilds() {
        $guilds = Guild::with('masterTable.index')->orderBy('win', 'DESC')
            ->orderBy('ladder_point', 'DESC')
            ->orderBy('level', 'DESC')
            ->orderBy('exp', 'DESC')
            ->limit(10)
            ->get();
        $topGuilds = [];
        foreach($guilds as $key => $guild) {
            $topGuilds[$key+1] = [
                'name' => $guild->name,
                'master' => $guild->master,
                'level' => $guild->level,
                'ladder_point' => $guild->ladder_point,
                'gold' => $guild->gold,
                'leader' => $guild->masterTable->name,
                'empire' => $this->getEmpireName($guild->masterTable->index->empire)
            ];
        }
        return $topGuilds;
    }

    public static function getAllGuilds() {
        $guilds = Guild::with('masterTable.index')->orderBy('win', 'DESC')
            ->orderBy('ladder_point', 'DESC')
            ->orderBy('level', 'DESC')
            ->orderBy('exp', 'DESC')
            ->get();
        $topGuilds = [];
        foreach($guilds as $key => $guild) {
            $topGuilds[$key+1] = [
                'name' => $guild->name,
                'master' => $guild->master,
                'level' => $guild->level,
                'ladder_point' => $guild->ladder_point,
                'gold' => $guild->gold,
                'leader' => $guild->masterTable->name,
                'empire' => MainController::getEmpireName($guild->masterTable->index->empire)
            ];
        }
        return $topGuilds;
    }
}
