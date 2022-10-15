<?php

namespace App\Http\Controllers;

use App\Repositories\RoleRepositories;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class RoleController extends Controller
{
    public function __construct(RoleRepositories $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }
    function get_list()
    {
        $roles = $this->roleRepository->getAll(5);
        return view('admin/roles/index', compact('roles'))->render();
    }
    function render_data(Request $request)
    {
        if ($request->perPage) {
            $perPage = $request->perPage;
        } else $perPage = 5;
        $roles = $this->roleRepository->getAll($perPage);
        return view('admin/roles/data', compact('roles'))->render();
    }
    public function edit($name)
    {
        $getData = $this->roleRepository->details($name);
        return view('admin/roles/edit')->with('data', $getData);
    }
    function insert(Request $request)
    {
        $name = $request->name;
        $this->roleRepository->insert($name);
    }
    function search(Request $request)
    {
        if ($request->perPage) {
            $perPage = $request->perPage;
        } else $perPage = 5;
        $roles = $this->roleRepository->search($request->search,$perPage);
        return view('admin/roles/data', compact('roles'))->render();
    }
    function update(Request $request)
    {
        $name = $request->name;
        $permissions = $request->permissions;
        $this->roleRepository->update($name, $permissions);
    }
    public function destroy(Request $request)
    {
        $this->roleRepository->delete($request->id);
    }
}
