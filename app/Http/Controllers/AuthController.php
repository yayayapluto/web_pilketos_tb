<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Responses\SendRedirect;
use Auth;
use Illuminate\Http\Request;
use Redirect;

class AuthController extends Controller
{
    public function showLoginForm() {
        return view("auth.loginForm");
    }

    public function login(LoginRequest $req) {
        try {
            $data = $req->validated();
            
            if (!Auth::attempt($data)) {
                return SendRedirect::withMessage("login", false, "Login credential not matched");
            }
            return redirect()->route("admin.dashboard");
        } catch (\Throwable $th) {
            throw SendRedirect::withMessage("login", false, "Error occured while login, please try again");
        }
    }

    public function logout() {
        Auth::logout();
        return SendRedirect::withMessage("landing", true, "Logged out successfully");
    }
}
