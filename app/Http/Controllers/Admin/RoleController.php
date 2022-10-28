<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\Admin\Role\RoleServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
   * role interface
   */
    private $roleInterface;

    public function __construct(RoleServiceInterface $roleServiceInterface)
    {
        $this->roleInterface = $roleServiceInterface;
    }

    public function index()
    {
        return view('admin.role.index');
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function saveRole(Request $request)
    {    
        $role_store = $this->roleInterface->saveRole($request);
        return $role_store;
    }

    public function editRole($id)
    {
        $role_edit = $this->roleInterface->editRole($id);
        return $role_edit;
    }

    public function updateRole(Request $request, $id)
    {
        $role_update = $this->roleInterface->updateRole($request, $id);
        return $role_update;
    }

    public function deleteRole($id)
    {
        $role_delete = $this->roleInterface->deleteRole($id);
        return $role_delete;
    }
}
