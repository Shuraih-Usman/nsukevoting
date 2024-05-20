<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Candidate;
use App\Models\Position;

class Candidates extends Controller
{
    //

    public function list($request) 
    {
        
        $draw = $request->input('draw');
        $start = $request->input('start');
        $length = $request->input('length');
        $searchValue = $request->input('search.value');
    
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir');
    
        $filterData = $request->input('filterdata');
    
        $query = Candidate::query()
        ->join('positions as p', 'c.position_id', '=', 'p.id')
        ->selectRaw('p.name as position_name, c.*')
        ->from('candidates as c');

    
        if ($filterData == 'Draft') {
            $query->where('c.status', 0);
        } elseif ($filterData == 'Actived') {
            $query->where('c.status', 1);
        }
    
        if (!empty($searchValue)) {
            $query->where('c.fullname', 'LIKE', "%$searchValue%");
        }
    
        $columns = ['c.id', 'c.fullname', 'c.status', 'c.created_at'];
        $orderColumn = $columns[$orderColumnIndex] ?? $columns[0];
        $orderDirection = isset($orderDirection) ? $orderDirection : 'desc';
    
        $query->orderBy($orderColumn, $orderDirection);
    
        $totalRecords = Candidate::count();
    
        $results = $query->skip($start)->take($length)->get();
        $totalFiltered = ($searchValue != '') ? $results->count() : $totalRecords;
    
        $data = [];
        foreach ($results as $row) {
            $status = $row->status == 1 ? '<span class="badge bg-label-primary me-1">Active</span>' : '<span class="badge bg-label-warning me-1">Inactive</span>';

            $image = '<img src="/images/candidates/'.$row->image.'" class="thumbnail" width="60" height="60"/>';
            $dropDown = '<div class="btn-group">
            <button type="button" class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bx bx-dots-vertical-rounded"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-end" style="">';
    
            if ($row->status != 1) {
                $dropDown .= '<li><a class="dropdown-item waves-effect waves-light activate" data-id="' . $row->id . '" href="#">Activate</a></li>';
            } else {
                $dropDown .= '<li><a class="dropdown-item waves-effect waves-light text-warning draft" href="#" data-id="'.$row->id.'">Draft</a></li>';
            }
    
            $dropDown .= '<a class="dropdown-item waves-effect waves-light text-info edit" href="#" data-id="' . $row->id . '">Edit</a></li>
                <li><a data-id="' . $row->id . '" class="dropdown-item waves-effect waves-light text-danger delete " href="#">Delete</a></li>
            </ul>
        </div>';
    
            $rowData = [
               $row->id,
               $image,
               $row->fullname,
               $row->position_name,
               $row->gender,
               $row->nickname,
               $row->level,
            //    $dropDown,
               $row->created_at->format('d M, Y')
            ];
            $rowData = array_combine(range(0, count($rowData) - 1), array_values($rowData));
            $data[] = $rowData;
        }
    
        $response = [
            "draw" => (int)$draw,
            "recordsTotal" => (int)$totalRecords,
            "recordsFiltered" => (int)$totalFiltered,
            "columns" => 0, 
            "data" => $data
        ];
    
        return $response;
    }


    public function add($request)
    {
        $s = 0;
        $m = "";

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'image' => 'required|mimes:jpg,png,gif,webp|max:3000',
            'team' => 'required|string',
            'position' => 'required',
            'sex' => 'required',

        ]);

        if ($validator->fails()) {
            $m = $validator->errors()->first();
        } else {
            $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
            $folder = 'candidates/';
            $request->file('image')->move(public_path('images/'.$folder), $imageName);

            $user = new Candidate();
            $user->fullname = $request->name;
            $user->nickname = $request->team;
            $user->level = $request->level;
            $user->gender = $request->sex;
            $user->image = $imageName;
            $user->position_id = $request->position;
            $user->image = $imageName;
            $user->save();
            $s = 1;
            $m = "You have successfully added a candidate";
        }

        return ['m' => $m, 's' => $s];
    }

    public function getPos() {

        $positions = new Position();

        $html = '<select class="form-select" name="position">
        <option value="">Select Position</option>';

        foreach($positions as $items) {
            $html .= '
            <option value="'.$items->id.'">'.$items->name.'</option>
        ';
        }

        $html .= '</select>';

        return $html;
    }
}
