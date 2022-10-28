<?php

namespace App\Dao\Admin\Blog;

use App\Contracts\Dao\Admin\Blog\BlogDaoInterface;
use App\Http\Requests\BlogRequest;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;

/**
 * Interface of Data Access Object for blog
 */
class BlogDao implements BlogDaoInterface
{
    /**
     * To save blog
     * @param int $request
     * @return Object Blog
     */
    public function blogSave(BlogRequest $request)
    {
        Blog::Create([
            'title' => $request->blogName,
            'slug' => Str::slug($request->blogName.Str::random(40)),
            'content' => $request->blogContent,
        ]);
    }

     /**
   * To edit blog
   * @param string $slug
   * @return Object Blog
   */
    public function blogEdit($slug)
    {
        $editBlog = Blog::where('slug',$slug)->first();
        return view('admin.blog.edit')->with([
            'edit_slug' => $editBlog->slug,
            'edit_title' => $editBlog->title,
            'edit_content' => $editBlog->content,
        ]);
    }

    /**
   * To update blog
   * @param string $slug and $request
   * @return Object Blog
   */
    public function blogUpdate(Request $request, $slug)
    {
        $updateBlog = Blog::where('slug',$slug)->first();
        $updateBlog->title = $request->editName;
        $updateBlog->slug = Str::slug($request->editName.Str::random(40));
        $updateBlog->content = $request->editContent;
        $updateBlog->save();
    }

     /**
   * To delete blog
   * @param string $slug
   * @return Object Blog
   */
    public function blogDelete($slug)
    {
        $deleteBlog = Blog::where('slug',$slug);
        $deleteBlog->delete();
    }
}
