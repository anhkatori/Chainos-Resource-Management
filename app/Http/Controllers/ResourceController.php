<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index(Request $request){
        $searchKey = $request->input('searchKey', null);
        return view('admin.resource.index', compact(
            'searchKey',
        ));
    }
}
