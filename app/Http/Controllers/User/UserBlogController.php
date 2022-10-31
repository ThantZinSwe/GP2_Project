<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class UserBlogController extends Controller
{
    public function index()
    {
        $blog = Blog::paginate(6);
        return view('user/blog')->with([
            'blogs' => $blog
        ]);
    }
}
