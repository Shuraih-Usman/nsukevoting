<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;

class AdminController extends Controller
{
    //

    public function Login() {
        return view('admin.login');
    }

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
        } else if($action == 'studentlogin') {

            $s = 0;

            if(empty($request->matric_number) || empty($request->date_of_birth)) {
                $m = "All fields are required";
            } else {

                $credentials = $request->only('matric_number', 'date_of_birth');
                $user = User::where('matric_number', $credentials['matric_number'])->first();

                $datetime = DB::table('election_time')->first();
                $startingdate = $datetime->start;
                $endingdate = $datetime->end;

                $targetDateTime = strtotime($datetime->end);
                $currentDateTime = time();
                if($currentDateTime > $targetDateTime) {
                    $m = " We are sorry Time up, voting has been closed";
                } else {

                    if($user->status != 0 ){
                        $m = "We are sorry you  already cast your vote";
                    } else {
                        if ($user && $user->date_of_birth == $credentials['date_of_birth']) {
                            Auth::login($user);
                            $s = 1;
                            $m = "Login Successfully";
                        } else {
                            $m = "Invalid credentials";
                        }
                    }
                }



    
            }

            return response()->json(['m'=>$m, 's' => $s]);
        }
        
    }

    public function Logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
