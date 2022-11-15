<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\Admin\Role\RoleServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
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

    /**
     * To show role view
     *
     * @return View Role
     */
    public function index()
    {
        $roles = Role::get();
        return view('admin.role.index')->with([
            "roles" => $roles,
        ]);
    }

    /**
     * To show role create view
     *
     * @return View role create
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * To save role request
     *@param RoleRequest $request
     * @return View Role
     */
    public function saveRole(RoleRequest $request)
    {
        $this->roleInterface->saveRole($request);
        return redirect('/admin/role')->with([
            'success' => 'Role create successfully',
        ]);
    }

    /**
     * To edit role data
     *@param $id
     * @return View role edit
     */
    public function editRole($id)
    {
        $role_edit = $this->roleInterface->editRole($id);
        return $role_edit;
    }

    /**
     * To update role data
     *@param $id and RoleRequest $request
     * @return View blog
     */
    public function updateRole(RoleRequest $request, $id)
    {
        $this->roleInterface->updateRole($request, $id);
        return redirect('/admin/role')->with(['success' => 'Role update successfully']);
    }

    /**
     * To delete role
     *@param $id
     * @return View role
     */
    public function deleteRole($id)
    {
        $this->roleInterface->deleteRole($id);
        return redirect('/admin/role')->with(['success' => 'Role delete successfully']);
    }
}
