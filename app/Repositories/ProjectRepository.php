<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository
{
    public function getProject($searchKey)
    {
        $data = Project::select(
            'id',
            'project_name',
            'Sale_PIC',
            'Market',
            'Time_deployment_start',
            'Time_deployment_end',
            'status',
        )->when(!empty($searchKey), function ($query) use ($searchKey) {
            $query->where(function ($query) use ($searchKey) {
                return $query->where('project_name', 'like', '%' . $searchKey . '%')
                    ->orwhere('Market', 'like', '%' . $searchKey . '%');
            });
        })
            ->get();
        return $data;
    }
    public function updateOrCreate($data, $id = null)
    {
        return Project::updateOrCreate([
            'id' => $id
        ], $data);
    }
}
