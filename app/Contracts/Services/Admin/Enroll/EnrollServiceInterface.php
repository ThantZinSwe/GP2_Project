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

    /**
     * To delete enroll
     * @param $id
     */
    public function delete($id);
}
