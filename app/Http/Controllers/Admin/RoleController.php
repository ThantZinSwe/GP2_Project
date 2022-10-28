<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\Admin\Role\RoleServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
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
        $roles = Role::get();
        return view('admin.role.index')->with([
            "roles" => $roles
        ]);
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function saveRole(Request $request)
    {    
        $role_store = $this->roleInterface->saveRole($request);
        return redirect('/admin/role')->with([
            'success' => 'Role create successfully'
        ]);
    }

    public function editRole($id)
    {
        $role_edit = $this->roleInterface->editRole($id);
        return $role_edit;
    }

    public function updateRole(Request $request, $id)
    {
        $role_update = $this->roleInterface->updateRole($request, $id);
        return redirect('/admin/role')->with(['success' => 'Role update successfully']);
    }

    public function deleteRole($id)
    {
        $role_delete = $this->roleInterface->deleteRole($id);
        return redirect('/admin/role')->with(['success' => 'Role delete successfully']);
    }
}
