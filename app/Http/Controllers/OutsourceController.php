<?php

namespace App\Http\Controllers;

use App\Repositories\OutsourceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Utils;
use Exception;
use Illuminate\Support\Facades\Redirect;

class OutsourceController extends Controller
{
    public function __construct(OutsourceRepository $outsourceRepository)
    {
        $this->outsourceRepository = $outsourceRepository;
    }
    public function index(Request $request){
        $searchKey = $request->input('searchKey', null);
        if (!empty($request->endDate)) {
            $startDate = $request->input('startDate', 10);
            $endDate = $request->input('endDate', 10);
        } else {
            $startDate = Utils::formatStartDateForStaff($request->startDate);
            $endDate = Utils::formatEndDateForStaff($request->startDate);
        }
        $Outsource = $this->outsourceRepository->getOutsource($searchKey);
        // dd($Outsource);
        return view('admin.outsource.index', compact(
            'Outsource',
            'searchKey',
            'startDate',
            'endDate',
        ));
    }
    public function add(){
        $project = DB::table('project')->get()->toArray();
        $staff = DB::table('users')->get()->toArray();
        return response()->json(['staff' => $staff,'project' => $project]);
    }
    public function store(Request $request){
        $data = $request->except(['startDate']);
        $data['time'] = Utils::formatStartDateForStaff($request->startDate);
        try {
            DB::beginTransaction();
            $this->outsourceRepository->updateOrCreate($data);
            DB::commit();
            return Redirect::back();
        } catch (Exception $e) {
            DB::rollback();
            return Redirect::back()->with('error', __('teams.Create error'));
        }
    }
}
