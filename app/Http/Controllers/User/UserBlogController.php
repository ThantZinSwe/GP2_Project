<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\Admin\Blog\BlogServiceInterface;
use App\Http\Controllers\Controller;
class UserBlogController extends Controller
{
    /**
     * blog interface
     */
    private $blogInterface;

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
        return view('user/blog')->with([
            'blogs' => $blog_search,
            'search' => request('blog-search'),
        ]);
    }

     /**
     * To show blogdetail
     *@param $slug
     * @return View blogDetail
     */
    public function blogDetail($slug)
    {
        $blog_detail = $this->blogInterface->blogDetail($slug);
        return view('user/blogdetail')->with([
            'details' => $blog_detail['blog'],
            'blog_late' => $blog_detail['blog_late'],
        ]);
    }

}
