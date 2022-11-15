<?php

namespace App\Contracts\Services\Admin\Blog;

use App\Http\Requests\BlogRequest;
use App\Http\Requests\BlogUpdateRequest;

/**
 * Interface of Data Access Object for blog
 */
interface BlogServiceInterface
{
    /**
     * To show blog view
     *
     * @return View blog
     */
    public function index();

    /**
     * To save blog
     * @param int $request
     * @return Object Blog
     */
    public function blogSave(BlogRequest $request);

    /**
     * To edit blog
     * @param string $slug
     * @return Object Blog
     */
    public function blogEdit($slug);

    /**
     * To update blog
     * @param string $slug and $request
     * @return Object Blog
     */
    public function blogUpdate(BlogUpdateRequest $request, $slug);

    /**
     * To delete blog
     * @param string $slug
     * @return Object Blog
     */
    public function blogDelete($slug);

    //User
    /**
     * To show blog
     * @return Object Blog
     */
    public function indexBlog();

    /**
     * To show blogdetail
     * @param string $slug
     * @return Object Blog
     */
    public function blogDetail($slug);
}
