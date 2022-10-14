<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\StaffsRepository;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function __construct(StaffsRepository $staffsRepository)
    {
        $this->staffRepository = $staffsRepository;
    }
    public function index(Request $request) {
        $searchKey = $request->input('searchKey', null);
        $limit = $request->input('limit', 10);
        $staffs = $this->staffRepository->getStaff($searchKey,$limit);
        return view('admin.staff.index', compact(
            'staffs',
            'searchKey',
            'limit'
        ));
    }
    public function add(){
        $data = DB::table('stafftypes')->get()->toArray();
        return response()->json(['type' => $data]);
    }
    public function store(Request $request){
        dd($request);
    }
}
