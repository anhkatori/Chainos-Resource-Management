<?php

namespace App\Repositories;

use App\Models\Administrative;

class AdministrativeRepository
{
    public function getdata($searchKey){
        $data = Administrative::get();
        return $data;
    }
    public function updateOrCreate($data, $id =null){
        return Administrative::updateOrCreate([
            'id' => $id
        ], $data);
    }
    public function getAdministrativeById($id){
        $data = Administrative::where('id', $id)->first()->toarray();
        return $data;
    }
    public function update(array $data, $id = null)
    {
        $record = Administrative::find($id);
        return $record->update($data);
    }
}
