<?php

namespace App\Services\Admin\Role;

use App\Contracts\Dao\Admin\Role\RoleDaoInterface;
use App\Contracts\Services\Admin\Role\RoleServiceInterface;
use App\Http\Requests\RoleRequest;

/**
 * Interface of Data Access Object for role
 */
class RoleService implements RoleServiceInterface
{
    private $roleDao;
    /**
     * Class Constructor
     * @param RoleDaoInterface
     * @return
     */
    public function __construct(RoleDaoInterface $roleDao)
    {
        $this->roleDao = $roleDao;
    }

    /**
     * To show role view
     *
     * @return View Role
     */
    public function index()
    {
        return $this->roleDao->index();
    }

    /**
     * To save role
     * @param int $request
     * @return Object Role
     */
    public function saveRole(RoleRequest $request)
    {
        return $this->roleDao->saveRole($request);
    }

    /**
     * To edit Role
     * @param int $id
     * * @return view edit
     */
    public function editRole($id)
    {
        return $this->roleDao->editRole($id);
    }

    /**
     * To Update Role with values from request
     * @param Request $request request including inputs and $id
     * @return Object updated role object
     */
    public function updateRole(RoleRequest $request, $id)
    {
        return $this->roleDao->updateRole($request, $id);
    }

    /**
     * To delete role
     * @param int $id
     * @return Object role object
     */
    public function deleteRole($id)
    {
        return $this->roleDao->deleteRole($id);
    }
}
