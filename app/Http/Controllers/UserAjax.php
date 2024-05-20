<?php
//SHURAIH USMAN CODE - https://github.com/Shuraih-Usman/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use Illuminate\Support\Facades\Validator;
use App\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Position;
use App\Models\Candidate;
class UserAjax extends Controller
{
    //

    public function vote(Request $request)
    {
        // Validate the form data
        $s = 0;
        $m = "";

        $validator = Validator::make($request->all(), [
            'elections' => 'required|array',
            'elections.*' => 'required|exists:candidates,id',
        ]);

        $user = User::find(auth()->id());

        if($user->status != 0) {
            $m = "We are sorry you  already cast your vote";
        } else {


            if ($validator->fails()) {
                $m = $validator->errors()->first();
            } else {
    
                if(count($request->elections) == 4) {
    
            // Process each election's candidate selection
            foreach ($request->elections as $election_id => $candidate_id) {
                // Save the vote to the database
                Vote::create([
                    'student_id' => auth()->id(), // Assuming the user is logged in
                    'election_id' => $election_id,
                    'candidate_id' => $candidate_id,
                ]);
            }
                    $user->status = 1;
                    $user->save();
                    $s = 1;
                    $m = "Your vote has been submitted successfully";
                } else {
    
                    $m = "Pls select all the elections";
                }
    
    
            }
    
    
        }




        // Return a JSON response
        return response()->json(['m' =>$m, 's' => $s]);
    }

    public function verifyOTP(Request $request) {
        $action = $request->action;

        if($action == 'sendotep') {

            $otp = rand(100000, 999999);
            $id = auth()->id();
            $user = User::find($id);
            $email = $user->email;
    
            $user->otp = $otp;
            $user->save();
    
            $details = [
                'title' => 'OTEP |NSUK EVOTING',
                'body' => 'Hi your One Time Election PIN is  '.$otp.' It would expired after 2 hours',
            ];
            try {
                Mail::to($email)->send(new Mailer($details));
                $m = 'Your One Time Election Pin has been sent to your email';
            } catch(\Exception $e) {
                $m = $e->getMessage();
            }
    
            return response()->json($m);
        } else if($action == 'validateotep') {
            $s =0;
            $otep = $request->otep;
            $id = auth()->id();
            $user = User::find($id);

            if($otep == $user->otp) {
                $user->otp = NULL;
                $user->save();
                $s =1;
                $m = "Successfully Verified";
            } else {
                $m = "Invalide OTEP";
            }

            return response()->json(['m' => $m, 's' => $s]);
        } else if($action == 'choice') {

            $data = $request->data;

            $results = collect($data)->map(function ($candidateId, $electionId) {
                $election = Position::with(['candidates' => function ($query) use ($candidateId) {
                    $query->where('id', $candidateId);
                }])->find($electionId);
            
                return [
                    'position' => $election,
                    'candidate' => $election ? $election->candidates->first() : null,
                ];
            })->filter(function ($item) {
                return $item['position'] && $item['candidate'];
            });

            return response()->json($results);

        }

    }

}
