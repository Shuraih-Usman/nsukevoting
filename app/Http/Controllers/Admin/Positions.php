<?php
//SHURAIH USMAN CODE - https://github.com/Shuraih-Usman/
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;
use Illuminate\Support\Facades\Validator;
class Positions extends Controller
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
    
        $query = Position::query();
    
        if ($filterData == 'Draft') {
            $query->where('status', 0);
        } elseif ($filterData == 'Actived') {
            $query->where('status', 1);
        }
    
        if (!empty($searchValue)) {
            $query->where('name', 'LIKE', "%$searchValue%");
        }
    
        $columns = ['id', 'name', 'status', 'created_at'];
        $orderColumn = $columns[$orderColumnIndex] ?? $columns[0];
        $orderDirection = isset($orderDirection) ? $orderDirection : 'desc';
    
        $query->orderBy($orderColumn, $orderDirection);
    
        $totalRecords = Position::count();
    
        $results = $query->skip($start)->take($length)->get();
        $totalFiltered = ($searchValue != '') ? $results->count() : $totalRecords;
    
        $data = [];
        foreach ($results as $row) {

    
            $rowData = [
               $row->id,
               $row->name,
               $row->created_at->format('d M, Y '),
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


        ]);

        if ($validator->fails()) {
            $m = $validator->errors()->first();
        } else {

            $user = new Position();
            $user->name = $request->name;
            $user->save();
            $s = 1;
            $m = "You have successfully added an Election";

        }

        return ['m' => $m, 's' => $s];
    }
}
