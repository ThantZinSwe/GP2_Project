<?php

namespace App\Contracts\Dao\Admin\Home;

/**
 * Interface of Data Access Object for home
 */
interface HomeDaoInterface
{
    /**
     * To show Home
     * @return count of courses,languages,user,video,blog
     */
    public function index();
}
