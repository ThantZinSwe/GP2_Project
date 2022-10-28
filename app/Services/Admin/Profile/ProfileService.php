<?php

namespace App\Services\Admin\Profile;

use App\Contracts\Dao\Admin\Profile\ProfileDaoInterface;
use App\Contracts\Services\Admin\Profile\ProfileServiceInterface;

class ProfileService implements ProfileServiceInterface
{
    /**
     * ProfileDaoInterface
     *
     * @var Object
     */
    private $profileDao;
    /**
     * ProfileService Constructor
     *
     * @param ProfileDaoInterface $profileDao
     */
    public function __construct(ProfileDaoInterface $profileDao)
    {
        $this->profileDao = $profileDao;
    }
    /**
     * Change Admin Profile
     * @param string $id user id
     * @param Request $request request including inputs
     * @return Object $user User object
     */
    public function changeProfile($id, $request)
    {
        return $this->profileDao->changeProfile($id, $request);
    }
    /**
     * Change Password
     * @param string $id user id
     * @param Request $request request including inputs
     * @return Object $user User object
     */
    public function changePassword($id, $request)
    {
        return $this->profileDao->changePassword($id, $request);
    }
}
