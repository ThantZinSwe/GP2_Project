<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\Admin\Blog\BlogServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;

class BlogController extends Controller
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
     * To show blog view
     *
     * @return View blog
     */
    public function index()
    {
        $blog = $this->blogInterface->index();
        return view('admin.blog.index')->with([
            "blogs" => $blog,
        ]);
    }

    /**
     * To show blog create view
     *
     * @return View blog create
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * To save blog request
     *@param BlogRequest $request
     * @return View blog
     */
    public function blogSave(BlogRequest $request)
    {
        $blog_store = $this->blogInterface->blogSave($request);
        if($blog_store){
            return redirect('/admin/blog')->with('success', "Blog create Successfully");
        }
        return redirect('/admin/blog')->with('error', "Blog create Fail");
    }

    /**
     * To edit blog data
     *@param $slug
     * @return View blog edit
     */
    public function blogEdit($slug)
    {
        $editBlog = $this->blogInterface->blogEdit($slug);

        return view('admin.blog.edit')->with([
            'edit_slug' => $editBlog->slug,
            'edit_title' => $editBlog->title,
            'edit_image' => $editBlog->image,
            'edit_content' => $editBlog->content,
        ]);
    }

    /**
     * To update blog data
     *@param $slug and BlogRequest $request
     * @return View blog
     */
    public function blogUpdate(BlogUpdateRequest $request, $slug)
    {
        $blog_update = $this->blogInterface->blogUpdate($request, $slug);
        if($blog_update){
            return redirect('/admin/blog')->with('success', "Blog update Successfully");
        }
        return redirect('/admin/blog')->with('error', "Blog update Fail");
    }

    /**
     * To delete blog
     *@param $slug
     * @return View blog
     */
    public function blogDelete($slug)
    {
        $blog_delete = $this->blogInterface->blogDelete($slug);
        if($blog_delete){
            return redirect('/admin/blog')->with('success', "Blog delete Successfully");
        }
        return redirect('/admin/blog')->with('error', "Blog delete Fail");
        
    }
}
