<?php

namespace App\Services\Admin\Home;

use App\Contracts\Dao\Admin\Home\HomeDaoInterface;
use App\Contracts\Services\Admin\Home\HomeServiceInterface;

/**
 * Interface of Data Access Object for home
 */
class HomeService implements HomeServiceInterface
{
    private $homeDao;
    /**
     * Class Constructor
     * @param HomeDaoInterface
     * @return
     */
    public function __construct(HomeDaoInterface $homeDao)
    {
        $this->homeDao = $homeDao;
    }

    /**
     * To show Home
     * @return count of courses,languages,user,video,blog
     */
    public function index()
    {
        return $this->homeDao->index();
    }
}
