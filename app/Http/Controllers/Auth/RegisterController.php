<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\MainController;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Date;

class RegisterController extends Controller
{
    private function existsUser(string $login, string $email)
    {
        try {
            $user = User::select('id', 'login')->where('login', $login)->orWhere('email', $email)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return false;
        }

        if ($user) {
            return true;
        }
        return false;
    }

    public function register(RegisterUserRequest $request)
    {
        if ($request->validated()) {
            if ($this->existsUser($request->login, $request->email)) {
                toastr()->error('Un cont are deja asociat acest username');
                return redirect()->back();
            }

            $date = new DateTime("now", new DateTimeZone('Europe/Bucharest'));
            $data = $request->except('_token');
            $data['create_time'] = $date->format('Y-m-d H:i:s');
            $create = User::create($data);
            if ($create) {
                $user = User::where('login', $data['login'])->where('email', $data['email'])->where('password', MainController::toMD5($data['password']))->first();
                Auth::login($user);
                toastr()->success('Te-ai inregistrat cu succes');
                return redirect()->back();
            }
        }
        return redirect()->route('app.home');
    }
}
