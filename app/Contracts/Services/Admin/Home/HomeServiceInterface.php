<?php

namespace App\Contracts\Services\Admin\Home;

/**
 * Interface of Data Access Object for home
 */
interface HomeServiceInterface
{
    /**
     * To show Home
     * @return count of courses,languages,user,video,blog
     */
    public function index();
}
