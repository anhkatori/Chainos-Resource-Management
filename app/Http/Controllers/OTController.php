<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\OTRepository;
use Illuminate\Support\Facades\DB;
use App\Utils;
use Exception;
use Illuminate\Support\Facades\Redirect;

class OTController extends Controller
{
    public function __construct(OTRepository $OTRepository)
    {
        $this->OTRepository = $OTRepository;
    }
    public function index(Request   $request){
        $searchKey = $request->input('searchKey', null);
        if (!empty($request->endDate)) {
            $startDate = $request->input('startDate', 10);
            $endDate = $request->input('endDate', 10);
        } else {
            $startDate = Utils::formatStartDateForStaff($request->startDate);
            $endDate = Utils::formatEndDateForStaff($request->startDate);
        }
        $Ot = $this->OTRepository->getOT($searchKey);
        return view('admin.OT.index', compact(
            'Ot',
            'searchKey',
            'startDate',
            'endDate',
        ));
    }
    public function add(){
        $data = DB::table('users')->get()->toArray();
        return response()->json(['staff' => $data]);
    }
    public function store(Request $request){
        $data = $request->except(['startDate']);
        $data['time'] = Utils::formatStartDateForStaff($request->startDate);
        try {
            DB::beginTransaction();
            $this->OTRepository->updateOrCreate($data);
            DB::commit();
            return Redirect::back();
        } catch (Exception $e) {
            DB::rollback();
            return Redirect::back()->with('error', __('teams.Create error'));
        }
    }
}
