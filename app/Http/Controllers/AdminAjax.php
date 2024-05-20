<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class AdminAjax extends Controller
{
    //

    public function index(Request $request, $modelname) {

        $action = $request->action;

        if($action ==  'add') {
            $ModeName = ucfirst($modelname);
            $add = "\App\Http\Controllers\Admin\\$ModeName";
            $add_instance = new $add();
            $adding = $add_instance->add($request);
            return response()->json($adding);
        }  else if($action == 'list') {

            $ModeName = ucfirst($modelname);
            $class = "\App\Http\Controllers\Admin\\$ModeName";
            $List = new $class();
            $data = $List->list($request);
            return response()->json($data);
        } else if($action == 'getPosition') {
            $class = new \App\Http\Controllers\Admin\Candidates();
            $data = $class->getPos();
            return response()->json($data);
        }  else if($action == 'setting') {
            $s = 0;
            $validator = Validator::make($request->all(), [
                'start' => 'required',
                'end' => 'required',
            ]);
            

            if ($validator->fails()) {
                $m = $validator->errors()->first();
            } else {


                
                DB::table('election_time')
                ->where('id', 1)
                ->update(['start' => $request->start, 'end' => $request->end]);
                $s = 1;
                $m = "Successfully Set Start and Ending Time of the election";
            }

            return response()->json(['m' => $m, 's' => $s]);

        }
    }
}
