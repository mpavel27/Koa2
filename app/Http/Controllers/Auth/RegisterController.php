<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\MainController;

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

            $create = User::create($request->except('_token'));
            if ($create) {
                $user = User::where('login', $request->login)->where('email', $request->email)->where('password', MainController::toMD5($request->password))->first();
                Auth::login($user);
                toastr()->success('Te-ai inregistrat cu succes');
            }
        }
        return redirect()->route('app.home');
    }
}
