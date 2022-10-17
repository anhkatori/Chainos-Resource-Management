<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Repositories\ProjectRepository;
use Carbon\Carbon;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Utils;

class DashboardController extends Controller
{
    //
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function index() {
        $datas = Project::get();
        // $start = Project::groupBy('Time_deployment_start', 'Time_deployment_end')->get();
        // dd($start);
        return view('admin.dashboard.index', compact('datas'));
    }
}
