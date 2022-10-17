<?php

namespace App\Repositories;

use App\Models\OT;

class OTRepository
{
    public function getOT($searchKey){
        $data = OT::select(
            "ot_cost.id",
            "ot_cost.time",
            "ot_cost.time_OT",
            "ot_cost.OT_cost",
            "users.full_name"
        )->leftJoin("users","users.staff_id","ot_cost.staff_id")
        ->when(!empty($searchKey), function ($query) use ($searchKey) {
            return $query->where('users.full_name', 'like', '%' . $searchKey . '%');
        })
        ->get();
        return $data;
    }
    public function updateOrCreate($data, $id = null)
    {
        // dd($data);
        return OT::updateOrCreate([
            'id' => $id
        ], $data);
    }
    public function getOTById($id){
        $data = OT::where('id', $id)->first()->toarray();
        return $data;
    }
    public function update(array $data, $id = null)
    {
        $record = OT::find($id);
        return $record->update($data);
    }
}
