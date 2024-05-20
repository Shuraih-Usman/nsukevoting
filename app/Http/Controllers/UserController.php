<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class UserController extends Controller
{
    //

    public function index(Request $request) {
        $action = $request->action;

        if($action == 'adminlogin') {

            $s = 0;
            $credentials = $request->only('email', 'password');

            if (Auth::guard('admin')->attempt($credentials)) {
                $s = 1;
                $m = "Login Successfully";
            } else {
                $m = "Invalid credentials ";
            }

            return response()->json(['m'=>$m, 's' => $s]);
        }
        
    }

    public function Login() {
        return view('user.login');
        
    }

        public function Logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->route('user-login');
    }
}
