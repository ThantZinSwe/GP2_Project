<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * @return View user/home
     */
    public function index()
    {
        return view('user.home');
    }
}