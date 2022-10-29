<?php

namespace App\Contracts\Dao\Admin\Blog;

use App\Http\Requests\BlogRequest;

/**
 * Interface of Data Access Object for blog
 */
interface BlogDaoInterface
{
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
    public function blogUpdate(BlogRequest $request, $slug);

    /**
     * To delete blog
     * @param string $slug
     * @return Object Blog
     */
    public function blogDelete($slug);
}
