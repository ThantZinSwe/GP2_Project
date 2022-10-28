<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Services\Admin\Blog\BlogServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{   
    /**
   * blog interface
   */
  private $blognterface;

  public function __construct(BlogServiceInterface $blogServiceInterface)
  {
      $this->blogInterface = $blogServiceInterface;
  }
    public function index()
    {
        $blog = Blog::get();
        return view('admin.blog.index')->with([
            "blogs" => $blog
        ]);
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function blogSave(BlogRequest $request)
    {
        $blog_store = $this->blogInterface->blogSave($request);
        return redirect('/admin/blog')->with('success',"Blog create Successfully");
    }

    public function blogEdit($slug)
    {
        $blog_edit = $this->blogInterface->blogEdit($slug);
        return $blog_edit;
    }

    public function blogUpdate(Request $request, $slug)
    {
        $blog_update = $this->blogInterface->blogUpdate($request, $slug);
        return redirect('/admin/blog')->with('success',"Blog update Successfully");
    }

    public function blogDelete($slug)
    {
        $blog_delete = $this->blogInterface->blogDelete($slug);
        return redirect('/admin/blog')->with('success',"Blog delete Successfully");
    }
}
