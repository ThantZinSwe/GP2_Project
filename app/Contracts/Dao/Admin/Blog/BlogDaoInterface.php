<?php

namespace App\Contracts\Dao\Admin\Blog;

use App\Http\Requests\BlogRequest;
use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for user
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
    public function blogUpdate(Request $request, $slug);

     /**
   * To delete blog
   * @param string $slug
   * @return Object Blog
   */
    public function blogDelete($slug);
}
