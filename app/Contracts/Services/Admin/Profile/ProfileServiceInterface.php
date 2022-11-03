<?php

namespace App\Contracts\Services\Admin\Profile;

/**
 * Profile Service Interface
 */
interface ProfileServiceInterface
{
    public function index();
    /**
     * Change Admin Profile
     * @param string $id user id
     * @param Request $request request including inputs
     * @return Object $user User object
     */
    public function changeProfile($id, $request);
    /**
     * Change Password
     * @param string $id user id
     * @param Request $request request including inputs
     * @return Object $user User object
     */
    public function changePassword($id, $request);
}
