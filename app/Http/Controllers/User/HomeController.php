<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\Admin\Home\HomeServiceInterface;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    private $homenterface;

    /**
     * Create new controller instance
     * @return void
     */
    public function __construct(HomeServiceInterface $homeServiceInterface)
    {
        $this->homeInterface = $homeServiceInterface;
    }

    /**
     * @return View user/home
     */
    public function index()
    {
        $home = $this->homeInterface->index();
        return $home;
    }
}
