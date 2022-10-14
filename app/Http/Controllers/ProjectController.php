<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProjectRepository;
use Illuminate\Support\Facades\DB;
use App\Utils;
use Exception;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }
    public function index(Request $request){
        $searchKey = $request->input('searchKey', null);
        $project = $this->projectRepository->getProject($searchKey);
        if (!empty($request->endDate)) {
            $startDate = $request->input('startDate', 10);
            $endDate = $request->input('endDate', 10);
        } else {
            $startDate = Utils::formatStartDateForStaff($request->startDate);
            $endDate = Utils::formatEndDateForStaff($request->startDate);
        }
        return view('admin.project.index', compact(
            'project',
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
        $data = $request->all();
        $data['Time_deployment_start'] = Utils::formatStartDateForStaff($request->startDate);
        $data['Time_deployment_end'] = Utils::formatStartDateForStaff($request->endDate);
        try {
            DB::beginTransaction();
            $this->projectRepository->updateOrCreate($data);
            DB::commit();
            return Redirect::back();
        } catch (Exception $e) {
            DB::rollback();
            return Redirect::back()->with('error', __('teams.Create error'));
        }
    }
}
