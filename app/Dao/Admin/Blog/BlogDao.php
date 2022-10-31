<?php

namespace App\Dao\Admin\Blog;

use App\Contracts\Dao\Admin\Blog\BlogDaoInterface;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use Illuminate\Support\Facades\File;
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
        $image = $request->file('image');
        $imageName = uniqid() . '-' . $image->getClientOriginalName();
        $image->move(public_path() . '/images/blog/', $imageName);
        Blog::Create([
            'title'   => $request->blogName,
            'slug'    => Str::slug($request->blogName . Str::random(40)),
            'image'   => $imageName,
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
        $editBlog = Blog::where('slug', $slug)->first();
        return view('admin.blog.edit')->with([
            'edit_slug'    => $editBlog->slug,
            'edit_title'   => $editBlog->title,
            'edit_image'   => $editBlog->image,
            'edit_content' => $editBlog->content,
        ]);
    }

    /**
     * To update blog
     * @param string $slug and $request
     * @return Object Blog
     */
    public function blogUpdate(BlogUpdateRequest $request, $slug)
    {
        $updateBlog = Blog::where('slug', $slug)->first();
        $image = $request->file('image');

        if (isset($image)) {

            $oldImage = $updateBlog->image;

            if (File::exists(public_path() . '/images/blog/' . $oldImage)) {

                File::delete(public_path() . '/images/blog/' . $oldImage);

            }

            $imageName = uniqid() . '-' . $image->getClientOriginalName();
            $image->move(public_path() . '/images/blog/', $imageName);
            $updateBlog->image = $imageName;
        }

        $updateBlog->title = $request->blogName;
        $updateBlog->slug = Str::slug($request->blogName . Str::random(40));
        $updateBlog->content = $request->blogContent;
        $updateBlog->save();
    }

    /**
     * To delete blog
     * @param string $slug
     * @return Object Blog
     */
    public function blogDelete($slug)
    {
        $deleteBlog = Blog::where('slug', $slug)->first();
        $delete_image = $deleteBlog->image;

        if (File::exists(public_path() . '/images/blog/' . $delete_image)) {

            File::delete(public_path() . '/images/blog/' . $delete_image);

        }

        $deleteBlog->delete();
    }

}
