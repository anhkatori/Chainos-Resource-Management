<?php

namespace App\Repositories;

use App\Models\Outsource;

class OutsourceRepository
{
    public function getOutsource($searchKey){
        $data = Outsource::select(
            "outsource_cost.time",
            "outsource_cost.outsource_cost",
            "users.full_name",
            "project.project_name"
        )->leftJoin("users","users.staff_id","outsource_cost.staff_id")
        ->leftJoin("project","project.id","outsource_cost.project_id")
        ->when(!empty($searchKey), function ($query) use ($searchKey) {
            $query->where(function ($query) use ($searchKey) {
                return $query->where('users.full_name', 'like', '%' . $searchKey . '%')
                        ->orwhere('project.project_name', 'like', '%' . $searchKey . '%');
                });
        })
        ->get();
        return $data;
    }
    public function updateOrCreate($data, $id = null)
    {
        // dd($data);
        return Outsource::updateOrCreate([
            'id' => $id
        ], $data);
    }
}
