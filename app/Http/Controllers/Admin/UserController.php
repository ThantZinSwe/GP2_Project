<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\Admin\User\UserServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * user interface
     */
    private $userInterface;

    public function __construct(UserServiceInterface $userServiceInterface)
    {
        $this->userInterface = $userServiceInterface;
    }

    /**
     * To show user view
     *
     * @return View User
     */
    public function index()
    {
        $user = User::all();
        return view('admin.user.index')->with([
            'users' => $user,
        ]);
    }

    /**
     * To block user
     *@param $id
     * @return View user
     */
    public function blockUser($id)
    {
        $block_user = $this->userInterface->blockUser($id);
        return redirect('/admin/users')->with(['success' => 'User block successfully']);
    }
}
