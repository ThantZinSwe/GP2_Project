<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\Admin\Blog\BlogServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class UserBlogController extends Controller
{
    /**
     * blog interface
     */
    private $blognterface;

    public function __construct(BlogServiceInterface $blogServiceInterface)
    {
        $this->blogInterface = $blogServiceInterface;
    }

     /**
     * To show blog
     * @return View blog
     */
    public function indexBlog()
    {
        $blog_search = $this->blogInterface->indexBlog();
        return $blog_search;
    }

     /**
     * To show blogdetail
     *@param $slug
     * @return View blogDetail
     */
    public function blogDetail($slug)
    {
        $blog_detail = $this->blogInterface->blogDetail($slug);
        return $blog_detail;
    }

}
