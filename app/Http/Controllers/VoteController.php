<?php
//SHURAIH USMAN CODE - https://github.com/Shuraih-Usman/
namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    public function index()
    {
        // Initial load with all votes for Blade view rendering
        $votes = Candidate::query()
            ->leftJoin('votes as v', 'v.candidate_id', '=', 'candidates.id')
            ->leftJoin('positions as p', 'v.election_id', '=', 'p.id')
            ->select('candidates.id', 'candidates.fullname', DB::raw('COUNT(v.id) as total_votes'), 'p.name')
            ->groupBy('candidates.id', 'candidates.fullname', 'p.name')
            ->get();

        return view('admin.demo', compact('votes'));
    }

    public function fetchResults(Request $request)
    {
        $positionId = $request->query('position');

        $query = Candidate::query()
            ->leftJoin('votes as v', 'v.candidate_id', '=', 'candidates.id')
            ->leftJoin('positions as p', 'candidates.position_id', '=', 'p.id')
            ->select('candidates.id', 'candidates.fullname', DB::raw('COUNT(v.id) as total_votes'))
            ->groupBy('candidates.id', 'candidates.fullname');

        if ($positionId) {
            $query->where('p.id', $positionId);
        }

        $candidates = $query->get();

        return response()->json([
            'candidates' => $candidates,
        ]);
    }
}

