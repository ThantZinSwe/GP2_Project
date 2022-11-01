<?php

namespace App\Contracts\Services\Admin\Enroll;

interface EnrollServiceInterface
{
    /**
     * @return Object $enrolls
     */
    public function index();

    /**
     * to change status accpeted
     */
    public function accepted($id);
}
