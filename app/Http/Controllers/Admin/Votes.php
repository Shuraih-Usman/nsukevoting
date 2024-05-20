<?php
//SHURAIH USMAN CODE - https://github.com/Shuraih-Usman/
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vote;
class Votes extends Controller
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
    
        $query = Vote::query()
        ->join('positions as p', 'v.election_id', '=', 'p.id')
        ->join('candidates as c', 'v.candidate_id', '=', 'c.id')
        ->join('users as u', 'v.student_id', '=', 'u.id')
        ->selectRaw('p.name as position_name, v.created_at, c.fullname as candidate_name, u.fullname as username, v.id')
        ->from('votes as v');

    
        if ($filterData == 'Draft') {
            $query->where('c.status', 0);
        } elseif ($filterData == 'Actived') {
            $query->where('c.status', 1);
        }
    
        if (!empty($searchValue)) {
            $query->where('u.fullname', 'LIKE', "%$searchValue%");
        }
    
        $columns = ['v.id', 'c.fullname', 'c.status', 'c.created_at'];
        $orderColumn = $columns[$orderColumnIndex] ?? $columns[0];
        $orderDirection = isset($orderDirection) ? $orderDirection : 'desc';
    
        $query->orderBy($orderColumn, $orderDirection);
    
        $totalRecords = Vote::count();
    
        $results = $query->skip($start)->take($length)->get();
        $totalFiltered = ($searchValue != '') ? $results->count() : $totalRecords;
    
        $data = [];
        foreach ($results as $row) {

            $rowData = [
               $row->id,
               $row->position_name,
               $row->candidate_name,
               $row->username,

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
}
