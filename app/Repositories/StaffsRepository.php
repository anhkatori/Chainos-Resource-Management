<?php

namespace App\Repositories;

use App\Models\Staff;

class StaffsRepository
{
    public function getStaff($searchKey,$limit){
        $data = Staff::select(
            "users.name",
            "users.full_name",
            "stafftypes.name as typename",
            "staffs.staff_id",
            "staffs.salary",
            "staffs.time_salary",
            "staffs.insurance",
            "staffs.time_insurance",
        )->leftJoin('users','users.staff_id','staffs.staff_id')
        ->leftJoin('stafftypes','stafftypes.id','staffs.type_id')
        ->when(!empty($searchKey), function ($query) use ($searchKey) {
            return $query->where('users.full_name', 'like', '%' . $searchKey . '%');
        })
        ->get();
        return $data;
    }
}
