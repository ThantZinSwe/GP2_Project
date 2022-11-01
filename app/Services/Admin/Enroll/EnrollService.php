<?php

namespace App\Services\Admin\Enroll;

use App\Contracts\Dao\Admin\Enroll\EnrollDaoInterface;
use App\Contracts\Services\Admin\Enroll\EnrollServiceInterface;

class EnrollService implements EnrollServiceInterface
{
    /**
     * $enrollDao
     */
    private $enrollDao;

    /**
     * Create new Dao instance
     * @return void
     */
    public function __construct(EnrollDaoInterface $enrollDaoInterface)
    {
        $this->enrollDao = $enrollDaoInterface;
    }

    /**
     * @return Object $enrolls
     */
    public function index()
    {
        return $this->enrollDao->index();
    }

    /**
     * to change status accpeted
     */
    public function accepted($id)
    {
        return $this->enrollDao->accepted($id);
    }
}