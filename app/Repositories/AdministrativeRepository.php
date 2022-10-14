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
}
