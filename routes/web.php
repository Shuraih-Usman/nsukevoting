<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminAjax;
use App\Http\Controllers\UserAjax;
use App\Models\Position;
use App\Models\Candidate;
use App\Models\Vote;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    $positions = Position::all();
    $votes = Candidate::query()
        ->leftJoin('votes as v', 'v.candidate_id', '=', 'candidates.id')
        ->leftJoin('positions as p', 'v.election_id', '=', 'p.id')
        ->select('candidates.id', 'candidates.fullname', DB::raw('COUNT(v.id) as total_votes'), 'p.name')
        ->groupBy('candidates.id', 'candidates.fullname', 'p.name')
        ->get();
    return view('welcome', ['votes' => $votes, 'positions' => $positions]);
});
Route::get('/api/election-results', [VoteController::class, 'fetchResults']);

Route::get('admin/login', [AdminController::class, 'Login'])->name('login');
Route::get('login', [UserController::class, 'Login'])->name('user-login');
Route::get('logout', [UserController::class, 'Logout'])->name('user-logout');

Route::match(['get', 'post'], '/ajax', [AdminController::class, 'index']);


Route::get('admin/logout', [AdminController::class, 'Logout'])->name('logout');
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {

        $votes = Vote::count();
        $candidates = Candidate::count();
        $voter =  Vote::distinct('student_id')->count('student_id');

        $data = (object)[
            'vote' => $votes,
            'candidate' => $candidates,
            'voter' => $voter,
        ];
        return view('admin.dashboard',['active1' => '','active2' =>'','active3' => '','active4' => '', 'active5' => 'active', 'active6' => '', 'dat' => $data]);


    })->name('dashboard');
    Route::get('/admin/candidates', function() {
        $a1 = 'active';
        $positions = Position::query()
                        ->get();

        // echo var_dump($positions);
        return view('admin.candidate',['active1' => $a1,'active2' => '','active3' => '','active4' => '','active5' => '', 'pos' => $positions,'active6' => '']);
    })->name('candidate');

    Route::get('/admin/elections', function() {
        $a1 = 'active';
        return view('admin.position',['active1' => '','active2' => $a1,'active3' => '','active4' => '', 'active5' => '','active6' => '']);
    })->name('elections');


    Route::get('/admin/demographic', function() {
        $a1 = 'active';
        $positions = Position::all();
        $votes = Candidate::query()
            ->leftJoin('votes as v', 'v.candidate_id', '=', 'candidates.id')
            ->leftJoin('positions as p', 'v.election_id', '=', 'p.id')
            ->select('candidates.id', 'candidates.fullname', DB::raw('COUNT(v.id) as total_votes'), 'p.name')
            ->groupBy('candidates.id', 'candidates.fullname', 'p.name')
            ->get();


        return view('admin.demo',['active1' => '','active2' => '','active3' => '','active4' => '', 'active5' => '','active6' => $a1, 'votes' => $votes, 'positions' => $positions]);
    })->name('demographic');

    Route::get('/admin/students', function() {
        $a1 = 'active';
        return view('admin.user',['active1' => '','active2' => '','active3' => $a1,'active4' => '', 'active5' => '','active6' => '']);
    })->name('students');

    Route::get('/admin/votes', function() {
        $a1 = 'active';
        return view('admin.vote',['active1' => '','active2' => '','active3' => '','active4' => $a1, 'active5' => '','active6' => '']);
    })->name('votes');


    Route::match(['get', 'post'], '/admin/{modelname}/process',[AdminAjax::class, 'index']);
    Route::get('/api/election-results', [VoteController::class, 'fetchResults']);
});

Route::middleware(['auth'])->group( function() {

    Route::get('/vote', function() {

        // $candidate = Candidate::query()
        //                         ->join('positions as p', 'c.position', 'p.id')
        //                         ->selectRaw('c.*, p.name, p.id as position_id')
        //                         ->from('candidates as c')
        //                         ->get();
        return view('user.vote', ['candidate' => Position::with('candidates')->get()]);
        
    });

    Route::match(['get', 'post'], '/votenow',[UserAjax::class, 'Vote']);
    Route::match(['get', 'post'], '/otep',[UserAjax::class, 'verifyOTP']);

});
