<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use App\Models\Player;
use App\Models\Settings;

class UserController extends Controller
{
    public function view() {
        $ch1 = MainController::checkPortOpen(env('CH1_PORT'));
        $ch2 = MainController::checkPortOpen(env('CH2_PORT'));
        $ch3 = MainController::checkPortOpen(env('CH3_PORT'));
        $ch4 = MainController::checkPortOpen(env('CH4_PORT'));
        $user = Auth::user();
        $countCharacters = $this->countCharacters(Auth::id());
        return view('user.usercp', compact([
            'ch1',
            'ch2',
            'ch3',
            'ch4',
            'user',
            'countCharacters'
        ]));
    }

    public function countCharacters($accountId) {
        $characters = Player::where('account_id', $accountId)->count();
        return $characters;
    }

    public function viewCharacters() {
        $ch1 = MainController::checkPortOpen(env('CH1_PORT'));
        $ch2 = MainController::checkPortOpen(env('CH2_PORT'));
        $ch3 = MainController::checkPortOpen(env('CH3_PORT'));
        $ch4 = MainController::checkPortOpen(env('CH4_PORT'));
        $user = Auth::user();
        $characters = $this->getUserCharacters(Auth::user()->id);
        return view('user.characters', compact([
            'ch1',
            'ch2',
            'ch3',
            'ch4',
            'user',
            'characters'
        ]));
    }

    public function getUserCharacters($user) {
        $characters = Player::where('account_id', $user)->get();
        return $characters;
    }

    public function debugCharacter(Request $request, $id) {
        $player = Player::with('index')->where('id', $id)->first();
        if($request->account_id == $player->account_id) {
            switch ($player->index->empire) {
                case 1:
                    $player->map_index = '0';
                    $player->x = '459770';
                    $player->y = '953980';
                    $player->exit_y = '0';
                    $player->exit_x = '0';
                    $player->exit_map_index = '0';
                    $player->horse_riding = '0';
                    $player->save();
                    toastr()->success('Caracterul a fost resetat, asteapta 5 minute pana cand sa se actualizeze pozitia');
                    return redirect()->back();
                case 2:
                    $player->map_index = '21';
                    $player->x = '52043';
                    $player->y = '166304';
                    $player->exit_y = '0';
                    $player->exit_x = '0';
                    $player->exit_map_index = '21';
                    $player->horse_riding = '0';
                    $player->save();
                    toastr()->success('Caracterul a fost resetat, asteapta 5 minute pana cand sa se actualizeze pozitia');
                    return redirect()->back();
                case 3:
                    $player->map_index = '41';
                    $player->x = '957291';
                    $player->y = '255221';
                    $player->exit_y = '0';
                    $player->exit_x = '0';
                    $player->exit_map_index = '41';
                    $player->horse_riding = '0';
                    $player->save();
                    toastr()->success('Caracterul a fost resetat, asteapta 5 minute pana cand sa se actualizeze pozitia');
                    return redirect()->back();
            }

        }
    }

    public function viewDownload() {
        $ch1 = MainController::checkPortOpen(env('CH1_PORT'));
        $ch2 = MainController::checkPortOpen(env('CH2_PORT'));
        $ch3 = MainController::checkPortOpen(env('CH3_PORT'));
        $ch4 = MainController::checkPortOpen(env('CH4_PORT'));
        $user = Auth::user();
        $characters = $this->getUserCharacters(Auth::user()->id);
        $megaLink = Settings::where('variable', 'megaDownload')->first();
        $driveLink = Settings::where('variable', 'driveDownload')->first();
        return view('download', compact([
            'ch1',
            'ch2',
            'ch3',
            'ch4',
            'user',
            'characters',
            'megaLink',
            'driveLink'
        ]));
    }
}
