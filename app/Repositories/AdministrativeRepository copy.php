<?php

namespace App\Repositories;

use App\Models\Administrative;

class AdministrativeRepository
{
    public function getdata(){
        $data = Administrative::get();
        return $data;
    }
}
