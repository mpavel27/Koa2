<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MainController;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;

class LoginController extends Controller
{
    public function logout() {
        if (Auth::check()) {
            toastr()->success("Revino curând " . Auth::user()->login);
            Auth::logout();
        }
        return redirect()->route('app.home');
    }

    public function login(LoginUserRequest $request)
    {
        if ($request->validated()) {
            $user = User::where('login', $request->login)
                ->where('password', MainController::toMD5($request->password))
                ->first();

            if ($user) {
                Auth::login($user);
                toastr()->success("Ma bucur sa te revad " . Auth::user()->login);
                return redirect()->route('app.home');
            }

            toastr()->error("Acreditările nu au fost găsite.");
        }
        return redirect()->back();
    }
}
