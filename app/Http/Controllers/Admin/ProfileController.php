<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * @return View Admin/dashboard
     */
    public function index()
    {
        return view('admin.index');
    }
}
