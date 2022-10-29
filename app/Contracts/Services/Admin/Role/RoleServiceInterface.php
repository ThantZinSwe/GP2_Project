<?php

namespace App\Contracts\Services\Admin\Role;

use App\Http\Requests\RoleRequest;
use App\Models\Role;

/**
 * Interface of Data Access Object for role
 */
interface RoleServiceInterface
{
    /**
     * To save role
     * @param int $request
     * @return Object Role
     */
    public function saveRole(RoleRequest $request);

    /**
     * To edit Role
     * @param int $id
     * * @return view edit
     */
    public function editRole($id);

    /**
     * To Update Role with values from request
     * @param Request $request request including inputs and $id
     * @return Object updated role object
     */
    public function updateRole(RoleRequest $request, $id);

    /**
     * To delete role
     * @param int $id
     * @return Object role object
     */
    public function deleteRole($id);
}
