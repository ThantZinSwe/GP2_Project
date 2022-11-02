<?php

namespace App\Contracts\Dao\Admin\Enroll;

interface EnrollDaoInterface
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
