<?php

namespace App\Dao\Admin\Role;

use App\Contracts\Dao\Admin\Role\RoleDaoInterface;
use App\Http\Requests\RoleRequest;
use App\Models\Role;

/**
 * Interface of Data Access Object for role
 */
class RoleDao implements RoleDaoInterface
{
    /**
     * To save role
     * @param int $request
     * @return Object Role
     */
    public function saveRole(RoleRequest $request)
    {
        $role = new Role;
        $role->name = $request->roleName;
        $role->save();
    }

    /**
     * To edit Role
     * @param int $id
     * * @return view edit
     */
    public function editRole($id)
    {
        $edit_role = Role::find($id);
        return view('admin.role.edit', [
            'edit_name' => $edit_role->name,
            'edit_id' => $edit_role->id,
        ]);
    }

    /**
     * To Update Role with values from request
     * @param Request $request request including inputs and $id
     * @return Object updated role object
     */
    public function updateRole(RoleRequest $request, $id)
    {
        $role = Role::find($id);
        $role->name = $request->roleName;
        $role->save();
    }

    /**
     * To delete role
     * @param int $id
     * @return Object role object
     */
    public function deleteRole($id)
    {
        $delete_role = Role::find($id);
        $delete_role->delete();
    }
}
