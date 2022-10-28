<?php

namespace App\Services\Admin\Role;

use App\Contracts\Dao\Admin\Role\RoleDaoInterface;
use App\Contracts\Services\Admin\Role\RoleServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
   * To save role
   * @param int $request
   * @return Object Role
   */
    public function saveRole(Request $request){
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
    public function updateRole(Request $request, $id)
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
