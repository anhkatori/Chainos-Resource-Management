<?php

namespace App\Http\Controllers;

use App\Repositories\AdministrativeRepository;
use Illuminate\Http\Request;
use App\Utils;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Exception;

class AdministrativeController extends Controller
{
    public function __construct(AdministrativeRepository $administrativeRepository)
    {
        $this->administrativeRepository = $administrativeRepository;
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
        $administrative = $this->administrativeRepository->getdata($searchKey);
        foreach($administrative as $a){
            $a['sum'] = $a->office_cost + $a->other_cost + $a->staff_cost;
            $a['average'] = $a['sum'] / $a->staffs;
        }
        return view('admin.administrative.index',compact(
            'administrative',
            'searchKey',
            'startDate',
            'endDate',
        ));
    }
    public function store(Request $request){
        $data = $request->except(['startDate']);
        $data['time'] = Utils::formatStartDateForStaff($request->startDate);
        dd($data);
        try {
            DB::beginTransaction();
            $this->administrativeRepository->updateOrCreate($data);
            DB::commit();
            return Redirect::back();
        } catch (Exception $e) {
            // DB::rollback();
            return Redirect::back()->with('e', $e);
        }
    }
    public function edit($id){
        $getData = $this->administrativeRepository->getAdministrativeById($id);
        return response()->json($getData);
    }
    public function update(Request $request){
        $data = $request->except(['startDate','id']);
        $id = $request->id;
        // $data['time'] = Utils::formatStartDateForStaff($request->startDate);
        // dd($data);
        try {
            DB::beginTransaction();
            $this->administrativeRepository->update($data,$id);
            DB::commit();
            return Redirect::back();
        } catch (Exception $e) {
            DB::rollback();
            return Redirect::back()->with('e', $e);
        }
    }
}
